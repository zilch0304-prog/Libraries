
# 📚 Library Management System

## 📖 Overview
The **Library Management System** is a web‑based project developed as part of the Midterm Examination.  
It allows **Admins** to manage books and categories, and **Users** to browse and rent books efficiently.

---

## 🎯 Objectives
- Apply CRUD operations in a real‑world project  
- Implement Admin & User roles  
- Allow book rental functionality  
- Organize books by category  
- Practice web development and database concepts  

---

## ✨ Features

### 👨‍💼 Admin
- Add / Update / Delete books  
- Create & manage categories  
- Manage book availability  
- Monitor rental records  

### 👤 User
- Register / Login  
- View categories and books  
- Rent books  
- View personal rental history  

---

## 🛠 Installation Guide

### ✅ Requirements
- PHP / Laravel *(if Laravel is used)*  
- MySQL Database  
- Composer *(if Laravel)*  
- XAMPP / WAMP / Laragon *(local server)*  

### 📌 Setup
```bash
git clone <repo‑url>
cd library‑management‑system
composer install
php artisan serve
```

---

## ▶️ Usage

### Admin Workflow
1. Login  
2. Add categories  
3. Add books  
4. Manage book rentals  

### User Workflow
1. Register / Login  
2. Browse categories  
3. Rent books  
4. View rentals  

---

## 📂 Folder Structure
```
/project
 ┣ app/
 ┣ public/
 ┣ resources/
 ┣ routes/
 ┗ README.md
```

---

## 💻 Sample Code Snippet
```php
public function rentBook(Request $request, $id) {
    $book = Book::findOrFail($id);
    $book->status = 'Rented';
    $book->save();

    return redirect()->back()->with('success', 'Book rented successfully!');
}
```

---

## 👨‍💻 Contributors
| Name | Role |
|------|------|
| Your Name | Developer |
| Partner (if any) | Contributor |

---

## 🪪 License
This project is for **academic and educational purposes only**.
