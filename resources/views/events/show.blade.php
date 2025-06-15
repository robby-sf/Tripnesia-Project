<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event - {{ $event->title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #e5ded1, #e2eae7);
            margin: 0;
            padding: 0;
        }

        .page-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .header-top {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .back-button {
            background-color: #e0e7ff;
            color: #5b6bff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2em;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-right: 15px;
        }

        .header-title {
            font-size: 1.5em;
            font-weight: 600;
            color: #333;
        }

        .event-content {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .event-image {
            flex: 1 1 350px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .event-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .event-details {
            flex: 1 1 500px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .event-title {
            font-size: 2em;
            margin: 0;
            color: #222;
        }

        .event-description {
            font-size: 1em;
            color: #555;
            text-align: justify;
            line-height: 1.6;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 0.95em;
            color: #666;
        }

        .event-meta div {
            display: flex;
            align-items: center;
        }

        .event-meta i {
            margin-right: 10px;
            color: #6a7bc2;

        }

        .event-meta .date {
            color: #2b4c7e;
            font-weight: 600;
        }

        .event-meta .location {
            color: #4d3b85;
            font-weight: 600;
        }

        .spacer {
            height: 80px;
        }

        @media (max-width: 768px) {
            .event-content {
                flex-direction: column;
            }

            .event-image,
            .event-details {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="header-top">
            <div class="back-button" onclick="history.back()">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="header-title">Detail Event</div>
        </div>

        <div class="event-content">
            <div class="event-image">
                <img src="{{ asset('storage/events/' . $event->image) }}" alt="{{ $event->title }}">
            </div>
            <div class="event-details">
                <h1 class="event-title">{{ $event->title }}</h1>
                <p class="event-description">{{ $event->description }}</p>
                <div class="event-meta">
                    <div><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</div>
                    <div><i class="fas fa-map-marker-alt"></i> {{ $event->location }}</div>
                </div>
            </div>
        </div>

        <div class="spacer"></div>
    </div>
</body>
</html>
