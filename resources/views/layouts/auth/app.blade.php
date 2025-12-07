<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @yield('content')
    <style>
      /* GLOBAL WRAPPER */
.auth-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #ffffff 0%, #e0f2fe 50%, #fecaca 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* CARD */
.auth-card {
    background: #ffffff;
    padding: 40px 45px;
    width: 100%;
    max-width: 450px;
    border-radius: 18px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.08);
    border-top: 6px solid #2563eb;   /* Blue Accent */
    animation: fadeIn 0.5s ease-in-out;
}

/* LOGO */
.auth-logo img {
    width: 70px;
    display: block;
    margin: 0 auto 15px;
}

/* TITLES */
.auth-title {
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    color: #1e3a8a;
}

.auth-subtitle {
    text-align: center;
    font-size: 15px;
    color: #64748b;
    margin-top: 6px;
}

/* ALERT */
.alert-error {
    background: #fee2e2;
    border-left: 4px solid #ef4444;
    padding: 12px 15px;
    margin-top: 20px;
    border-radius: 8px;
    color: #991b1b;
}

/* FORM */
.login-form {
    margin-top: 25px;
}

/* FORM GROUP */
.form-group {
    margin-bottom: 18px;
}

.form-group label {
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 6px;
    display: block;
}

.form-group input {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    outline: none;
    background: #f8fafc;
    transition: 0.2s;
}

.form-group input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
}

/* OPTIONS */
.login-options {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    font-size: 14px;
}

.remember input {
    margin-right: 6px;
}

.forgot {
    color: #2563eb;
    text-decoration: none;
}

/* BUTTON LOGIN */
.btn-login {
    width: 100%;
    background: linear-gradient(90deg, #1d4ed8, #2563eb);
    color: white;
    padding: 12px 0;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.2s ease-in-out;
}

.btn-login:hover {
    background: linear-gradient(90deg, #1e40af, #1d4ed8);
}

/* DIVIDER */
.login-divider {
    text-align: center;
    margin: 22px 0;
    color: #6b7280;
    font-size: 14px;
}

/* SOCIAL BUTTONS */
.social-buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 20px;
}

.btn-social {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: white;
    font-weight: bold;
    text-decoration: none;
}

.google { background: #ef4444; }   /* Red */
.facebook { background: #2563eb; } /* Blue */
.twitter { background: #1d9bf0; }  /* Light Blue */

.btn-social:hover {
    opacity: 0.85;
    transform: translateY(-2px);
    transition: 0.2s;
}

/* REGISTER */
.register-text {
    text-align: center;
    color: #475569;
    margin-top: 10px;
}

.register-link {
    color: #ef4444;
    text-decoration: none;
    font-weight: bold;
}

.register-link:hover {
    text-decoration: underline;
}

/* ANIMATION */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

/* RESPONSIVE */
@media (max-width: 480px) {
    .auth-card {
        padding: 30px 25px;
    }
}
    </style>
</body>
</html>