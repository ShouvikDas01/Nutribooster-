![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=flat&logo=jquery&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=flat&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=flat&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)

# NutriBooster Website

NutriBooster is a **health and fitness supplements brand** website, built as my **first full-stack web project**.  
It showcases products, provides company information, and enables users to register, log in, manage carts, and place orders.  

---

## 🌐 Introduction
The NutriBooster website is designed to provide users with an engaging and informative experience.  

It includes:
- Responsive design for all devices  
- Interactive navigation bar with off-canvas menu  
- Engaging scroll animations using WOW.js  
- Product carousels for featured & trending items  
- Newsletter subscription form  
- Blog section to keep users updated  
- Shopping cart + checkout functionality  
- Order history for users  
- Product filters & reviews  
- User registration/login with validation  
- Back-to-top button & footer with contact info  

⚡ **Note:** Since external libraries are used (Bootstrap, Font Awesome, WOW.js, SweetAlert), an **internet connection** is required for icons, styles, and animations to load.

---

## 🛠️ Main Features
- **Responsive Design**: Optimized for mobile, tablet, and desktop.  
- **Interactive Navigation**: Off-canvas menu with smooth transitions.  
- **Animations**: WOW.js + SweetAlert for scroll and alert effects.  
- **Cart & Checkout**: Add, update, and remove products with review and order placement.  
- **Blog Section**: Informative blogs about fitness & nutrition.  
- **Reviews & Ratings**: Users can review products.  
- **Authentication**: Registration & login forms with validations.  
- **Database Integration**: Full CRUD functionality via MySQL + PHP.  

---

## 🗄️ Database Description
The backend runs on a **MySQL database (`nutriboost`)** created via phpMyAdmin.  

### Tables:
- `user` → stores user details  
- `products` → product details  
- `product_images` → secondary product images  
- `product_category` → product categories  
- `cart` → items added by users  
- `orders` → orders placed  
- `shipping_address` → user shipping details  
- `contactus` → queries submitted by users  
- `blog` → blog posts  
- `newsletter` → email subscriptions  
- `reviews` → user reviews  
- `partners` → partner logos  
- `about_partners` → partner info  

---

## ⚙️ Working
- All **frontend interactivity** is handled in `main.js`  
- All **backend processing** is done in `backend_file.php`  
- The **database** is connected via `connect.php`  
- A `nutriboost.sql` file (included in ZIP) contains the schema & sample data  

---

## 📂 Repository Structure
```
NutriBooster/
├── assets/              # images, css, js files
├── backend_file.php     # backend logic
├── connect.php          # DB connection
├── main.js              # all frontend functionality
├── nutriboost.sql       # database schema + sample data
├── index.html           # homepage
├── README.md            # project documentation
```

---

## 📄 License
This project was created as part of my coursework.  
Feel free to explore and learn from the code.  

---

## ✍️ Author
**Shouvik Das**  
- MSc in Computer Science, 2024
- GitHub: [ShouvikDas01](https://github.com/ShouvikDas01)  

