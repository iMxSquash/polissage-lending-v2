#!/usr/bin/env python3
import json
import sys
from datetime import datetime

def format_course_data(courses):
    """Format and enrich course data"""
    
    if not courses:
        return {"error": "No course data provided"}
    
    formatted_courses = []
    
    for course in courses:
        formatted_course = {
            "id": course.get('id'),
            "title": course.get('title', '').strip(),
            "description": course.get('description', '').strip(),
            "duration": course.get('duration', ''),
            "price": float(course.get('price', 0)),
            "formatted_price": f"{course.get('price', 0)}€",
            "image": course.get('image', ''),
            "slug": generate_slug(course.get('title', '')),
            "difficulty_level": determine_difficulty(course.get('title', ''), course.get('description', '')),
            "category": determine_category(course.get('title', ''), course.get('description', ''))
        }
        formatted_courses.append(formatted_course)
    
    # Sort by price
    formatted_courses.sort(key=lambda x: x['price'])
    
    return {
        "courses": formatted_courses,
        "total_courses": len(formatted_courses),
        "price_range": {
            "min": min(course['price'] for course in formatted_courses) if formatted_courses else 0,
            "max": max(course['price'] for course in formatted_courses) if formatted_courses else 0
        },
        "processed_at": datetime.now().isoformat()
    }

def generate_slug(title):
    """Generate URL-friendly slug from title"""
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
    slug = re.sub(r'-+', '-', slug)
    return slug.strip('-')

def determine_difficulty(title, description):
    """Determine course difficulty based on title and description"""
    text = (title + ' ' + description).lower()
    
    if any(word in text for word in ['débutant', 'initiation', 'base']):
        return 'beginner'
    elif any(word in text for word in ['avancé', 'professionnel', 'expert']):
        return 'advanced'
    else:
        return 'intermediate'

def determine_category(title, description):
    """Determine course category"""
    text = (title + ' ' + description).lower()
    
    if 'polissage' in text:
        return 'polishing'
    elif any(word in text for word in ['detailing', 'nettoyage']):
        return 'detailing'
    elif 'protection' in text:
        return 'protection'
    else:
        return 'general'

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"error": "No input file provided"}))
        return
    
    try:
        with open(sys.argv[1], 'r', encoding='utf-8') as f:
            data = json.load(f)
        
        result = format_course_data(data)
        print(json.dumps(result, ensure_ascii=False))
        
    except Exception as e:
        print(json.dumps({"error": str(e)}))

if __name__ == "__main__":
    main()
