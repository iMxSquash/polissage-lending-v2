#!/usr/bin/env python3
import json
import sys
from datetime import datetime

def process_reviews_data(reviews):
    """Process reviews data and calculate analytics"""
    
    if not reviews:
        return {"error": "No reviews data provided"}
    
    total_reviews = len(reviews)
    total_rating = sum(review.get('rating', 0) for review in reviews)
    average_rating = total_rating / total_reviews if total_reviews > 0 else 0
    
    # Rating distribution
    rating_distribution = {i: 0 for i in range(1, 6)}
    for review in reviews:
        rating = review.get('rating', 0)
        if 1 <= rating <= 5:
            rating_distribution[rating] += 1
    
    # Recent reviews (last 30 days)
    recent_reviews = []
    current_date = datetime.now()
    
    for review in reviews:
        try:
            review_date = datetime.strptime(review.get('date', ''), '%Y-%m-%d')
            days_diff = (current_date - review_date).days
            if days_diff <= 30:
                recent_reviews.append(review)
        except ValueError:
            continue
    
    return {
        "total_reviews": total_reviews,
        "average_rating": round(average_rating, 2),
        "rating_distribution": rating_distribution,
        "recent_reviews_count": len(recent_reviews),
        "processed_at": current_date.isoformat()
    }

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"error": "No input file provided"}))
        return
    
    try:
        with open(sys.argv[1], 'r', encoding='utf-8') as f:
            data = json.load(f)
        
        result = process_reviews_data(data)
        print(json.dumps(result, ensure_ascii=False))
        
    except Exception as e:
        print(json.dumps({"error": str(e)}))

if __name__ == "__main__":
    main()
