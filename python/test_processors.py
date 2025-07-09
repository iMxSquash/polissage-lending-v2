#!/usr/bin/env python3
import json
import sys
import os

def test_processors():
    """Test all data processors with sample data"""
    
    # Sample data
    courses_data = [
        {"id": 1, "title": "Formation Detailing", "description": "Formation complète", "price": 599},
        {"id": 2, "title": "Polissage Avancé", "description": "Techniques professionnelles", "price": 399}
    ]
    
    reviews_data = [
        {"id": 1, "name": "Test User", "rating": 5, "comment": "Excellent", "date": "2024-01-15"},
        {"id": 2, "name": "Another User", "rating": 4, "comment": "Très bien", "date": "2024-01-10"}
    ]
    
    script_dir = os.path.dirname(__file__)
    
    # Test course formatter
    print("Testing course formatter...")
    test_file = os.path.join(script_dir, 'temp_courses.json')
    with open(test_file, 'w', encoding='utf-8') as f:
        json.dump(courses_data, f)
    
    course_script = os.path.join(script_dir, 'processors', 'course_formatter.py')
    result = os.popen(f'python "{course_script}" "{test_file}"').read()
    print("Course formatter result:", result)
    
    # Test reviews analytics
    print("\nTesting reviews analytics...")
    test_file = os.path.join(script_dir, 'temp_reviews.json')
    with open(test_file, 'w', encoding='utf-8') as f:
        json.dump(reviews_data, f)
    
    reviews_script = os.path.join(script_dir, 'processors', 'reviews_analytics.py')
    result = os.popen(f'python "{reviews_script}" "{test_file}"').read()
    print("Reviews analytics result:", result)
    
    # Cleanup
    for temp_file in ['temp_courses.json', 'temp_reviews.json']:
        temp_path = os.path.join(script_dir, temp_file)
        if os.path.exists(temp_path):
            os.remove(temp_path)
    
    print("\nAll processors tested successfully!")

if __name__ == "__main__":
    test_processors()
