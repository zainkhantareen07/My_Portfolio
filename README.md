# 💼 Personal Portfolio Website

A responsive and interactive **personal portfolio website** built with **HTML**, **CSS**, and **JavaScript**, featuring **Firebase Authentication** for user sign-up and login. This site is perfect for showcasing your work, skills, hobbies, and resume — all wrapped in a clean and modern design.

---

## 🚀 Features

- ✅ **Firebase Email/Password Authentication**
  - Secure user sign-up with email verification
  - Login with validation
- ✅ **Modern UI/UX Design**
  - Smooth hover effects and animated transitions
  - Gradient backgrounds and box shadows
- ✅ **Responsive Layout**
  - Works across mobile, tablet, and desktop devices
- ✅ **Portfolio Highlights**
  - Image & video gallery
  - Skills and hobbies
  - Resume download
- ✅ **Forms & Interactivity**
  - Feedback/contact form
  - Sign-up and login validation with JavaScript

---

## 📁 Folder Structure

Personal-Portfolio/
├── README.md
├── src/
│ ├── assets/
│ │ └── style.css # Main CSS stylesheet
│ ├── media/ # Image, video and asset files
│ ├── myresume/
│ │ └── resume.pdf # Your downloadable resume
│ └── pages/
│ ├── home.html # Main home/landing page
│ ├── signup.html # Sign-up form with Firebase auth
│ └── login.html # Login form with Firebase auth


---

## 🔧 Firebase Setup Instructions

> Before login/sign-up can work, make sure Firebase is configured properly:

1. Go to [Firebase Console](https://console.firebase.google.com/)
2. Create a new project (or use an existing one)
3. Navigate to:
   **Authentication → Sign-in method** → Enable **Email/Password**
4. Get your Firebase SDK credentials:
   **Project Settings → General → Web App → Firebase SDK snippet**
5. Replace the Firebase config in your HTML files like this:

```js
const firebaseConfig = {
  apiKey: "YOUR_API_KEY",
  authDomain: "your-app.firebaseapp.com",
  projectId: "your-app-id",
  storageBucket: "your-app.appspot.com",
  messagingSenderId: "SENDER_ID",
  appId: "APP_ID"
};
firebase.initializeApp(firebaseConfig);

| Language       | Purpose                       |
| -------------- | ----------------------------- |
| **HTML5**      | Structure of the web pages    |
| **CSS3**       | Styling and layout            |
| **JavaScript** | Form handling & Firebase auth |
| **Firebase**   | Authentication backend        |

📷 Sign-Up Page | 🔐 Login Page | 🏠 Home Page | 🖼️ Gallery

🌐 Hosting (Optional)

You can host your portfolio on:

🔗 GitHub Pages
        www.github.com/zainkhantareen07
    
🔗 Firebase Hosting

🔗 Netlify

Let me know if you want help setting that up!

🧑‍💻 Author

Name: ZAIN KHAN TAREEN
📧 zk344693@gmail.com

🔗 LinkedIn : www.linkedin.com/in/zainkhantareen07

🌍 Portfolio Link: yourdomain.com