<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Animal Pride</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #ff6b35;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .info-box {
            background-color: white;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #ff6b35;
            border-radius: 4px;
        }
        .info-label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 150px;
        }
        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 5px 5px;
            font-size: 12px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Animal Pride</h1>
        <p>Grooming Appointment Confirmation</p>
    </div>
    
    <div class="content">
        <div class="success-message">
            <strong>✓ Booking Confirmed!</strong><br>
            Thank you for booking with Animal Pride. Your appointment has been confirmed.
        </div>

        <h2>Appointment Details</h2>
        
        <div class="info-box">
            <div><span class="info-label">Pet Name:</span> {{ $appointment->pet_name }}</div>
        </div>
        
        <div class="info-box">
            <div><span class="info-label">Pet Type:</span> {{ $appointment->pet_type }}</div>
        </div>
        
        <div class="info-box">
            <div><span class="info-label">Owner Name:</span> {{ $appointment->owner_name }}</div>
        </div>
        
        <div class="info-box">
            <div><span class="info-label">Appointment Date:</span> {{ $appointment->appointment_date->format('l, F d, Y') }}</div>
        </div>
        
        <div class="info-box">
            <div><span class="info-label">Appointment Time:</span> {{ date('g:i A', strtotime($appointment->appointment_time)) }}</div>
        </div>
        
        @if($appointment->groomer)
        <div class="info-box">
            <div><span class="info-label">Groomer:</span> {{ $appointment->groomer->name }}</div>
        </div>
        @endif
        
        @if($appointment->special_instructions)
        <div class="info-box">
            <div><span class="info-label">Special Instructions:</span></div>
            <div style="margin-top: 10px;">{{ $appointment->special_instructions }}</div>
        </div>
        @endif

        <div style="margin-top: 30px; padding: 20px; background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 4px;">
            <strong>Important Notes:</strong>
            <ul style="margin-top: 10px;">
                <li>Please arrive 10 minutes before your scheduled appointment time.</li>
                <li>If you need to reschedule or cancel, please contact us at least 24 hours in advance.</li>
                <li>Bring your pet's vaccination records if this is their first visit.</li>
            </ul>
        </div>

        <p style="margin-top: 30px;">
            If you have any questions or need to make changes to your appointment, please contact us at your earliest convenience.
        </p>

        <p>
            We look forward to seeing you and your pet!
        </p>

        <p>
            Best regards,<br>
            <strong>Animal Pride Team</strong>
        </p>
    </div>
    
    <div class="footer">
        <p>© {{ date('Y') }} Animal Pride. All rights reserved.</p>
        <p>This is an automated confirmation email. Please do not reply to this email.</p>
    </div>
</body>
</html>
