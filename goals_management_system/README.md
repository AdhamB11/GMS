# Goals Management System

A web-based platform for managing personal and professional goals, tracking milestones, and monitoring progress.

## Features

- User registration and authentication
- Goal creation, editing, and deletion
- Milestone management
- Automated reminders for deadlines
- Visual progress tracking and reporting
- Data export in PDF formats

## Technical Requirements

- Python 3.8+
- Django 5.0
- MySQL database
- Modern web browser (Chrome 100+, Firefox 90+, Edge, Safari)

## Installation

1. Clone the repository
2. Create a virtual environment:
   ```
   python -m venv venv
   venv\Scripts\activate
   ```
3. Install dependencies:
   ```
   pip install -r requirements.txt
   ```
4. Configure environment variables in `.env`
5. Run migrations:
   ```
   python manage.py migrate
   ```
6. Start the development server:
   ```
   python manage.py runserver
   ```

## Project Structure

- `goals/` - Main application directory
  - `models.py` - Database models for goals and milestones
  - `views.py` - View logic
  - `urls.py` - URL routing
  - `templates/` - HTML templates
  - `static/` - Static files (CSS, JS, images)
