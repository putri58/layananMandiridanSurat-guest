<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .profile-section {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
        }
        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #4CAF50;
            margin: 0 auto 20px;
            display: block;
        }
        .no-photo {
            font-size: 80px;
            color: #ccc;
            margin: 20px 0;
        }
        .info-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4CAF50;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #45a049;
        }
        .btn-warning {
            background: #ffc107;
        }
        .btn-warning:hover {
            background: #e0a800;
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile - {{ $user->name }}</h1>
        
        <div class="profile-section">
            @if($user->profile_picture && Storage::disk('public')->exists($user->profile_picture))
                <img src="{{ asset('storage/' . $user->profile_picture) }}" 
                     alt="Profile Picture of {{ $user->name }}" 
                     class="profile-img">
                <p><small>File: {{ basename($user->profile_picture) }}</small></p>
            @else
                <div class="no-photo">👤</div>
                <h3>No Profile Picture Uploaded</h3>
                <p>User belum mengupload foto profil.</p>
                <a href="{{ route('user.edit', $user->id) }}" class="btn">
                    📤 Upload Foto Profil
                </a>
            @endif
        </div>
        
        <div class="info-card">
            <h3>User Information</h3>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> <span style="background: #4CAF50; color: white; padding: 3px 10px; border-radius: 15px;">{{ $user->role_label ?? 'User' }}</span></p>
            <p><strong>Account Created:</strong> {{ $user->created_at ? $user->created_at->format('d F Y H:i') : 'N/A' }}</p>
        </div>
        
        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">
                ✏️ Edit Profile
            </a>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                ← Back to User List
            </a>
        </div>
    </div>
</body>
</html>