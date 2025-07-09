#!/usr/bin/env python3
import json
import os
from datetime import datetime, timedelta

def create_sample_data():
    """Create sample data files for development"""
    
    # Sample courses data
    courses = [
        {
            "id": 1,
            "title": "Formation Detailing Complet",
            "description": "Formation complète au detailing automobile avec techniques professionnelles",
            "duration": "3 jours",
            "price": 599,
            "image": "/images/course1.jpg"
        },
        {
            "id": 2,
            "title": "Polissage Professionnel",
            "description": "Maîtrisez les techniques avancées de polissage automobile",
            "duration": "2 jours",
            "price": 399,
            "image": "/images/course2.jpg"
        },
        {
            "id": 3,
            "title": "Protection Céramique",
            "description": "Application de revêtements céramiques pour protection longue durée",
            "duration": "1 jour",
            "price": 299,
            "image": "/images/course3.jpg"
        }
    ]
    
    # Sample reviews data
    reviews = []
    names = ["Jean Dupont", "Marie Martin", "Pierre Durand", "Sophie Leroy", "Michel Bernard"]
    comments = [
        "Excellente formation, très professionnelle",
        "J'ai appris énormément de techniques",
        "Très bon contenu pédagogique",
        "Formateur compétent et à l'écoute",
        "Formation pratique et concrète"
    ]
    
    for i in range(5):
        date = datetime.now() - timedelta(days=i*7)
        reviews.append({
            "id": i + 1,
            "name": names[i],
            "rating": 5 if i < 2 else 4,
            "comment": comments[i],
            "date": date.strftime("%Y-%m-%d")
        })
    
    # Create data directory if it doesn't exist
    data_dir = os.path.join(os.path.dirname(__file__), '..', 'data')
    os.makedirs(data_dir, exist_ok=True)
    
    # Write courses data
    with open(os.path.join(data_dir, 'courses.json'), 'w', encoding='utf-8') as f:
        json.dump(courses, f, ensure_ascii=False, indent=2)
    
    # Write reviews data
    with open(os.path.join(data_dir, 'reviews.json'), 'w', encoding='utf-8') as f:
        json.dump(reviews, f, ensure_ascii=False, indent=2)
    
    print("Sample data created successfully!")
    print(f"- {len(courses)} courses")
    print(f"- {len(reviews)} reviews")

if __name__ == "__main__":
    create_sample_data()
