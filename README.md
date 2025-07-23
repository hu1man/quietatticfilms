# 🎬 Quiet Attic Films Database System

Welcome to the Quiet Attic Films Database System! This web application helps you manage film productions and client information with a modern, minimalistic interface.

## 🚀 Features

- 🌟 Add, update, and delete film productions
- 👤 Add new clients with contact info
- 📋 View all productions in a clean, professional table
- 🎨 Beautiful dark-themed UI with spring green accents
- 🖼️ Custom background image support
- 🖱️ Responsive forms and navigation

## 🛠️ Setup Instructions

1. 📁 Place the `quietatticfilms` folder in the `htdocs` directory of your XAMPP installation.
2. ▶️ Start the XAMPP Control Panel and ensure that Apache and MySQL services are running.
3. 🌐 Open phpMyAdmin by navigating to `http://localhost/phpmyadmin` in your web browser.
4. 🗄️ Run the SQL commands in `sql/schema.sql` to create the database and tables:
   - `QuietAtticDB` (database)
   - `Production` (table)
   - `client` (table)
5. 🖥️ Access the web app in your browser:
   - Home: `http://localhost/quietatticfilms/index.php`
   - Add Production: `http://localhost/quietatticfilms/insert.php`
   - Update Production: `http://localhost/quietatticfilms/update.php`
   - Delete Production: `http://localhost/quietatticfilms/delete.php`
   - Add Client: `http://localhost/quietatticfilms/add_client.php`

## 📦 Folder Structure

```
quietatticfilms/
├── db.php
├── index.php
├── insert.php
├── update.php
├── delete.php
├── add_client.php
├── styles.css
├── bg.jpg
├── README.md
└── sql/
    └── schema.sql
```

## 📝 Usage Guide

- To add a new production, go to **Insert New Production** and fill out the form.
- To update or delete a production, use the respective pages and enter the required IDs.
- To add a new client, use the **Add New Client** page and provide the name and contact info.
- All navigation links are available in the navbar on every page.

## 💡 Tips

- Make sure the `ClientID` you use for productions exists in the `client` table.
- The background image (`bg.jpg`) can be replaced for a custom look.
- All forms are validated for required fields.

## 🧑‍💻 Technologies Used

- PHP
- MySQL
- HTML & CSS (Poppins font, responsive design)
- XAMPP (Apache & MySQL)

## 🖼️ Screenshots

> Add screenshots of your web app here for a visual overview!

## 📚 License

This project is for educational purposes. Feel free to modify and use it for your own needs!

---

Made with ❤️ by Quiet Attic Films