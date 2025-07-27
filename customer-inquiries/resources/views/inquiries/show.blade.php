<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Inquiry - Customer Inquiry System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .inquiry-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .info-group h3 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        
        .info-group p {
            font-size: 1.1rem;
            color: #333;
        }
        
        .message-section {
            margin-bottom: 30px;
        }
        
        .message-section h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
        
        .message-content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            line-height: 1.6;
            color: #555;
        }
        
        .actions {
            display: flex;
            gap: 15px;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn {
            background: #667eea;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background: #e74c3c;
        }
        
        .btn-danger:hover {
            background: #c0392b;
        }
        
        .back-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .timestamp {
            color: #999;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .inquiry-info {
                grid-template-columns: 1fr;
            }
            
            .actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('inquiries.index') }}" class="back-link">← Back to All Inquiries</a>
        
        <div class="header">
            <h1>Inquiry Details</h1>
            <div class="timestamp">
                Submitted on {{ $inquiry->created_at->format('F d, Y at h:i A') }}
            </div>
        </div>

        <div class="inquiry-info">
            <div class="info-group">
                <h3>Customer Name</h3>
                <p>{{ $inquiry->name }}</p>
            </div>
            
            <div class="info-group">
                <h3>Email Address</h3>
                <p>{{ $inquiry->email }}</p>
            </div>
            
            <div class="info-group">
                <h3>Phone Number</h3>
                <p>{{ $inquiry->formatted_phone ?? 'Not provided' }}</p>
            </div>
            
            <div class="info-group">
                <h3>Last Updated</h3>
                <p>{{ $inquiry->updated_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>

        <div class="message-section">
            <h3>Message</h3>
            <div class="message-content">
                {{ $inquiry->message }}
            </div>
        </div>

        <div class="actions">
            <div>
                <a href="{{ route('inquiries.edit', $inquiry->id) }}" class="btn">Edit Inquiry</a>
            </div>
            
            <form action="{{ route('inquiries.destroy', $inquiry->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Inquiry</button>
            </form>
        </div>
    </div>
</body>
</html>