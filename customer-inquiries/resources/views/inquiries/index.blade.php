<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Inquiries - Customer Inquiry System</title>
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
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
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

        .btn-small {
            padding: 8px 16px;
            font-size: 12px;
            margin-right: 5px;
        }

        .inquiry-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .inquiry-card:hover {
            transform: translateY(-5px);
        }

        .inquiry-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .inquiry-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }

        .inquiry-email {
            color: #667eea;
            font-size: 0.9rem;
        }

        .inquiry-phone {
            color: #666;
            font-size: 0.9rem;
        }

        .inquiry-message {
            margin: 15px 0;
            color: #555;
            line-height: 1.6;
        }

        .inquiry-date {
            font-size: 0.8rem;
            color: #999;
            margin-bottom: 15px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .no-inquiries {
            background: white;
            border-radius: 20px;
            padding: 60px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .no-inquiries h2 {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ url('/') }}" class="back-link">← Back to Home</a>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="header">
            <h1>Customer Inquiries</h1>
            <a href="{{ route('inquiries.create') }}" class="btn">+ New Inquiry</a>
        </div>

        @if ($inquiries->count() > 0)
            @foreach ($inquiries as $inquiry)
                <div class="inquiry-card">
                    <div class="inquiry-header">
                        <div>
                            <div class="inquiry-name">{{ $inquiry->name }}</div>
                            <div class="inquiry-email">{{ $inquiry->email }}</div>
                            @if ($inquiry->phone)
                                <div class="inquiry-phone">{{ $inquiry->formatted_phone }}</div>
                            @endif
                        </div>
                        <div class="inquiry-date">
                            {{ $inquiry->created_at->format('M d, Y h:i A') }}
                        </div>
                    </div>

                    <div class="inquiry-message">
                        "{{ $inquiry->message }}"
                    </div>

                    <div class="actions">
                        <a href="{{ route('inquiries.show', $inquiry->id) }}" class="btn btn-small">View</a>
                        <a href="{{ route('inquiries.edit', $inquiry->id) }}" class="btn btn-small">Edit</a>
                        <form action="{{ route('inquiries.destroy', $inquiry->id) }}" method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-small">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-inquiries">
                <h2>No inquiries yet</h2>
                <p>When customers submit inquiries, they will appear here.</p>
                <br>
                <a href="{{ route('inquiries.create') }}" class="btn">Submit First Inquiry</a>
            </div>
        @endif
    </div>
</body>

</html>
