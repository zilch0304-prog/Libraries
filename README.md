# 📚 Library Management System

## 📖 Project Description / Overview
The **Library Management System** is a web-based system created for my **Midterm Examination**.  
It allows the **Admin** to manage book categories and books, while **Users** can browse and rent books.  
This system modernizes the traditional library process by providing an easy-to-use platform for borrowing and managing books.

---

## 🎯 Objectives
- Develop a functional CRUD-based system  
- Implement login and role-based access (Admin & User)  
- Allow users to browse and rent books online  
- Practice system development and database management skills  
- Improve understanding of full-stack web development  

---

## ✨ Features / Functionality

### 👨‍💼 Admin Features
- Login to admin account  
- Add, edit, delete book categories  
- Add, edit, delete books  
- Manage book availability  
- View and manage user rental activities  

### 👤 User Features
- Register and login  
- View available categories and books  
- Rent books  
- View rental records  

---

## 🛠️ Installation Instructions

### ✅ Requirements
- PHP / Laravel *(if Laravel was used)*  
- MySQL Database  
- Composer *(if Laravel)*  
- XAMPP / WAMP / Laragon *(local server)*  

### 📌 Steps
```bash
git clone <repository-link>
cd library-management-system
composer install
php artisan serve
```

---

## ▶️ Usage

### 🔐 Login Steps

**Admin Login**
1. Go to login page  
2. Enter admin email & password  
3. Access admin dashboard  

**User Login**
1. Register for a user account  
2. Login with your credentials  
3. Browse books and categories  

### 📚 System Workflow

| Admin Workflow | User Workflow |
|----------------|---------------|
| Login | Register / Login |
| Add categories | View categories |
| Add books | Browse books |
| Manage rentals | Rent books |
| Track availability | View rental history |

---

## 📸 Screenshots / Code Snippet

### 🖼 Screenshot Placeholder

![System Screenshot](screenshots/Screenshot-2025-10-29-223538.png)


### 💻 Example Code Snippet
```php
public function rentBook(Request $request, $id) {
    $book = Book::findOrFail($id);
    $book->status = 'Rented';
    $book->save();

    return redirect()->back()->with('success', 'Book rented successfully!');
}
```

---

## 👥 Contributors
| Name | Role |
|------|------|
| **Aaron Jay Licudine** | Developer |
| **Janvic** | Collaborator |

---


## 📄 License
This project is developed for our project in ITPC 115 and is intended for academic and educational purposes only.

 












































