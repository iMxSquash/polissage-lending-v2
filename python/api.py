#!/usr/bin/env python3
import os
import json
from flask import Flask, request, jsonify
from flask_cors import CORS
from datetime import datetime

app = Flask(__name__)
CORS(app)

@app.route('/health', methods=['GET'])
def health_check():
    return jsonify({"status": "ok", "service": "python-api"})

@app.route('/process/reviews', methods=['POST'])
def process_reviews():
    try:
        data = request.get_json()
        if not data:
            return jsonify({"error": "No data provided"}), 400
        
        reviews = data.get('reviews', [])
        total_reviews = len(reviews)
        
        if total_reviews == 0:
            return jsonify({"error": "No reviews data"}), 400
        
        total_rating = sum(review.get('rating', 0) for review in reviews)
        average_rating = round(total_rating / total_reviews, 2)
        
        rating_distribution = {i: 0 for i in range(1, 6)}
        for review in reviews:
            rating = review.get('rating', 0)
            if 1 <= rating <= 5:
                rating_distribution[rating] += 1
        
        return jsonify({
            "total_reviews": total_reviews,
            "average_rating": average_rating,
            "rating_distribution": rating_distribution,
            "processed_at": datetime.now().isoformat()
        })
        
    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/process/courses', methods=['POST'])
def process_courses():
    try:
        data = request.get_json()
        if not data:
            return jsonify({"error": "No data provided"}), 400
        
        courses = data.get('courses', [])
        
        formatted_courses = []
        for course in courses:
            formatted_course = {
                "id": course.get('id'),
                "title": course.get('title', '').strip(),
                "description": course.get('description', '').strip(),
                "price": float(course.get('price', 0)),
                "formatted_price": f"{course.get('price', 0)}€",
                "slug": generate_slug(course.get('title', '')),
                "category": determine_category(course.get('title', ''))
            }
            formatted_courses.append(formatted_course)
        
        formatted_courses.sort(key=lambda x: x['price'])
        
        return jsonify({
            "courses": formatted_courses,
            "total_courses": len(formatted_courses),
            "price_range": {
                "min": min(c['price'] for c in formatted_courses) if formatted_courses else 0,
                "max": max(c['price'] for c in formatted_courses) if formatted_courses else 0
            },
            "processed_at": datetime.now().isoformat()
        })
        
    except Exception as e:
        return jsonify({"error": str(e)}), 500

def generate_slug(title):
    import re
    slug = title.lower()
    slug = re.sub(r'[àáâãäå]', 'a', slug)
    slug = re.sub(r'[èéêë]', 'e', slug)
    slug = re.sub(r'[ìíîï]', 'i', slug)
    slug = re.sub(r'[òóôõö]', 'o', slug)
    slug = re.sub(r'[ùúûü]', 'u', slug)
    slug = re.sub(r'[ç]', 'c', slug)
    slug = re.sub(r'[^a-z0-9\s-]', '', slug)
    slug = re.sub(r'\s+', '-', slug)
    return re.sub(r'-+', '-', slug).strip('-')

def determine_category(title):
    text = title.lower()
    if 'polissage' in text:
        return 'polishing'
    elif 'detailing' in text:
        return 'detailing'
    elif 'protection' in text:
        return 'protection'
    return 'general'

if __name__ == '__main__':
    port = int(os.environ.get('PORT', 10000))
    app.run(host='0.0.0.0', port=port, debug=False)
