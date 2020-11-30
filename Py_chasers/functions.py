import smtplib, ssl
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

import Passwords

def send_email(receiver_mail, name):
    MESSAGE_BODY = f'Hi {name},\n\nThank You for registering on StudentTech.\nYou have been successfully registered to the application\nYou can now login any time using your credentials'

    port = 465  # For SSL
    smtp_server = "smtp.gmail.com"

    msg = MIMEMultipart()       # create a message
    msg['From']=Passwords.ADDRESS
    msg['To']=receiver_mail
    msg['Subject']="Successfully Registered"

    # add in the message body
    msg.attach(MIMEText(MESSAGE_BODY, 'plain'))
    text = msg.as_string()

    context = ssl.create_default_context()
    with smtplib.SMTP_SSL(smtp_server, port, context=context) as server:
        server.login(Passwords.ADDRESS, Passwords.PASSWORD)
        server.sendmail(Passwords.ADDRESS, receiver_mail, text)

    print('Mail Sent')
