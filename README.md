# Guestbook Application 🎉

Guestbook application where users can leave their reviews and feedback. Users can submit their name, message, and optionally attach an image. Reviews are displayed on the page after submission.

## Current Look 📸
![image](https://github.com/user-attachments/assets/e5290a1b-c7ee-4e34-9a2f-73a71a760a61)
![image](https://github.com/user-attachments/assets/28ebdbc0-a6b8-4a11-88ab-d4d61387ecf2)
![image](https://github.com/user-attachments/assets/22cf49a4-55cf-40f1-a783-3670d648c13c)

![image](https://github.com/user-attachments/assets/fcbc031b-99f2-4a7f-902c-28ee99429131)

## Features 🚀
- Submit your name and review. ✍️
- Attach an image with the review. 📸
- View submitted reviews including the name, message, and attached images. 👀
- Simple and responsive UI. 💻
- Admin users can delete reviews using middleware for access control 🛠️

## Technology Stack ⚙️

- **Backend:**  
  - **PHP** with **Laravel** 🐘
  
- **Frontend:**  
  - **Tailwind CSS** (for styling and responsive layout) 🌊
  - **HTML** (for the structure of the page) 📄
  - **JavaScript** (for interactive features) 📲
  
- **Database:**  
  - **MySQL** (for storing user reviews and images) 🗄️

## Installation 🔧

1. **Clone the repository:**
   ```bash
   git clone https://github.com/VasylHryn/guestbook.git

2. **Navigate to the project directory:**
   ```bash
   cd guestbook
   
3. **Install dependencies:**
   ```bash
   composer install
   
4. **Set up your .env file:**
    
    Copy the .env.example to .env and configure your database connection:
   ```bash
   cp .env.example .env

5. **Generate an application key:**
   ```bash
   php artisan key:generate
  
6. **Run migrations:**
   ```bash
   php artisan migrate

6. **Start the development server:**
   ```bash
   php artisan serve
   
# Usage 🌍

**Visit http://localhost:8000 in your web browser to start using the Guestbook.**
