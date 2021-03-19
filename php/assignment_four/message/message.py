def send_sms(numbers):
    import requests
    import random
    message = str(random.randint(1000, 9999))
    backup = message
    message = "Your OTP is: " + message
    url = "https://www.fast2sms.com/dev/bulk"
    payload = "sender_id=FSTSMS&message=" + message+ "&language=english&route=p&numbers=" + numbers
    print(payload)
    headers = {
    'authorization': "",
    'Content-Type': "application/x-www-form-urlencoded",
    'Cache-Control': "no-cache",
    }
    response = requests.request("POST", url, data=payload, headers=headers)
    return backup