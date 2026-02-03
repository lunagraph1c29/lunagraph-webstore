<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Katalog Produk</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }
        

        .login-header h1 {
            font-size: 2rem;
            margin-bottom: 8px;
        }
        
        .login-header p {
            opacity: 0.85;
        }
        
        .login-body {
            padding: 40px;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        .alert-close {
            float: right;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            line-height: 1;
            opacity: 0.7;
        }
        
        .alert-close:hover {
            opacity: 1;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 1.2rem;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .form-control.error {
            border-color: #dc3545;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }
        
        .error-message.show {
            display: block;
        }
        
        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }
        
        .divider span {
            background: white;
            padding: 0 15px;
            position: relative;
            color: #999;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-muted {
            color: #666;
        }
        
        .link {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .link:hover {
            color: #5568d3;
            text-decoration: underline;
        }
        
        code {
            background: #e9ecef;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
        
        @media (max-width: 480px) {
            .login-header {
                padding: 30px 20px;
            }
            
            .login-body {
                padding: 30px 20px;
            }
            
            .login-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>Admin Login</h1>
                <p>Masuk ke Dashboard Admin</p>
            </div>
            
            <div class="login-body">
                @if ($errors->any())
                <div class="alert">
                    <button class="alert-close" onclick="this.parentElement.remove()">×</button>
                    <strong>⚠️ Login Gagal!</strong>
                    <ul style="margin: 10px 0 0 20px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}" id="loginForm" onsubmit="return validateForm()">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email" class="form-label">📧 Email Address</label>
                        <div class="input-wrapper">
                            <span class="input-icon"></span>
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="admin@katalog.com"
                                   required 
                                   autofocus>
                        </div>
                        <div class="error-message" id="emailError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon"></span>
                            <input type="password" 
                                   class="form-control" 
                                   id="password" 
                                   name="password"
                                   placeholder="password"
                                   required>
                        </div>
                        <div class="error-message" id="passwordError"></div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Masuk ke Dashboard
                    </button>
                </form>
                
                <div class="divider">
                    <span>atau</span>
                </div>
                
                <div class="text-center">
                    <a href="{{ route('home') }}" class="link">← Kembali ke Website</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form validation
        function validateForm() {
            let isValid = true;
            
            // Email validation
            const email = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!email.value) {
                showError(email, emailError, 'Email wajib diisi');
                isValid = false;
            } else if (!emailRegex.test(email.value)) {
                showError(email, emailError, 'Format email tidak valid');
                isValid = false;
            } else {
                hideError(email, emailError);
            }
            
            // Password validation
            const password = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');
            
            if (!password.value) {
                showError(password, passwordError, 'Password wajib diisi');
                isValid = false;
            } else if (password.value.length < 6) {
                showError(password, passwordError, 'Password minimal 6 karakter');
                isValid = false;
            } else {
                hideError(password, passwordError);
            }
            
            return isValid;
        }
        
        function showError(input, errorElement, message) {
            input.classList.add('error');
            errorElement.textContent = message;
            errorElement.classList.add('show');
        }
        
        function hideError(input, errorElement) {
            input.classList.remove('error');
            errorElement.classList.remove('show');
        }
        
        // Clear error on input
        document.getElementById('email').addEventListener('input', function() {
            hideError(this, document.getElementById('emailError'));
        });
        
        document.getElementById('password').addEventListener('input', function() {
            hideError(this, document.getElementById('passwordError'));
        });
    </script>
</body>
</html>
