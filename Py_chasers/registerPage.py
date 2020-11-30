from os import remove
from tkinter import *
from tkinter.ttk import *
from tkinter import ttk
import tkinter.messagebox as ms
import hashlib
from pymongo import MongoClient
import os
from functions import send_email

import main
import functions
import Passwords

client = MongoClient(Passwords.MONGO_URI)
db = client['Student-db']
credentials = db.credentials
details = db.details

class Register(Frame):
    def __init__(self, root):
        root.maxsize(400,400)
        root.minsize(400,400)
        root.title('Sign UP')
        Frame.__init__(self)
        self.grid()
        self.register(root)
        # root.mainloop()

    def register(self, root):
        space = Label(root, width=12).grid(row=0, column=0, pady=20)

        nameLabel = Label(root, text="Name:     ",foreground="blue",font="comicsansms 10 bold").grid(row=1, column=1, sticky='w')

        self.nameEntry = Entry(root, width=25)
        self.nameEntry.grid(row=1, column=2, sticky='e')
        self.nameEntry.insert(0, "Enter Your Name")
        self.nameEntry.bind('<FocusIn>', lambda event, entry=self.nameEntry, text="Enter Your Name": self.on_click(event, entry, text))
        self.nameEntry.bind('<FocusOut>', lambda event, entry=self.nameEntry, text="Enter Your Name": self.of_click(event, entry, text))
        self.nameEntry.configure(foreground='grey')

        genderLabel = Label(root, text="Gender:     ", foreground="blue",font="comicsansms 10 bold").grid(row=2, column=1, sticky='w', pady=10)

        self.radioVar = StringVar()
        male = Radiobutton(root, text='Male', value='M', variable=self.radioVar).grid(row=2, column=2, sticky='w')
        female = Radiobutton(root, text='Female', value='F', variable=self.radioVar).grid(row=2, column=2, sticky='e')

        fatherNameLabel = Label(root, text="Father's Name:     ",foreground="blue",font="comicsansms 10 bold").grid(row=3, column=1, sticky='w', pady=10)

        self.fatherNameEntry = Entry(root, width=25)
        self.fatherNameEntry.grid(row=3 ,column=2)
        self.fatherNameEntry.insert(0, "Enter Your Father's Name")
        self.fatherNameEntry.bind('<FocusIn>', lambda event, entry=self.fatherNameEntry, text="Enter Your Father's Name": self.on_click(event, entry, text))
        self.fatherNameEntry.bind('<FocusOut>', lambda event, entry=self.fatherNameEntry, text="Enter Your Father's Name": self.of_click(event, entry, text))
        self.fatherNameEntry.configure(foreground='grey')

        userNameLabel = Label(root, text='Username:     ',foreground="blue",font="comicsansms 10 bold").grid(row=4, column=1, sticky='w', pady=10)

        self.userNameEntry = Entry(root, width=25)
        self.userNameEntry.grid(row=4, column=2)
        self.userNameEntry.insert(0, "Enter Your Email ID")
        self.userNameEntry.bind('<FocusIn>', lambda event, entry=self.userNameEntry, text="Enter Your Email ID": self.on_click(event, entry, text))
        self.userNameEntry.bind('<FocusOut>', lambda event, entry=self.userNameEntry, text="Enter Your Email ID": self.of_click(event, entry, text))
        self.userNameEntry.configure(foreground='grey')

        passwordLabel = Label(root, text='Password:     ',foreground="blue",font="comicsansms 10 bold").grid(row=5, column=1, sticky='w', pady=10)

        self.passwordEntry = Entry(root, width=25)
        self.passwordEntry.grid(row=5, column=2)
        self.passwordEntry.insert(0, "Enter Your Password")
        self.passwordEntry.bind('<FocusIn>', lambda event, entry=self.passwordEntry, text="Enter Your Password": self.on_click(event, entry, text))
        self.passwordEntry.bind('<FocusOut>', lambda event, entry=self.passwordEntry, text="Enter Your Password": self.of_click(event, entry, text))
        self.passwordEntry.configure(foreground='grey')

        rePasswordLabel = Label(root, text='Retype Password:     ',foreground="blue",font="comicsansms 10 bold").grid(row=6, column=1, sticky='w', pady=10)

        self.rePasswordEntry = Entry(root, width=25)
        self.rePasswordEntry.grid(row=6, column=2)
        self.rePasswordEntry.insert(0, "Retype Your Password")
        self.rePasswordEntry.bind('<FocusIn>', lambda event, entry=self.rePasswordEntry, text="Retype Your Password": self.on_click(event, entry, text))
        self.rePasswordEntry.bind('<FocusOut>', lambda event, entry=self.rePasswordEntry, text="Retype Your Password": self.of_click(event, entry, text))
        self.rePasswordEntry.configure(foreground='grey')

        mobileLabel = Label(root, text='Mobile No.:     ',foreground="blue",font="comicsansms 10 bold").grid(row=7, column=1, sticky='w', pady=10)

        self.mobileEntry = Entry(root, width=25)
        self.mobileEntry.grid(row=7, column=2)
        self.mobileEntry.insert(0, "Enter Your Mobile No.")
        self.mobileEntry.bind('<FocusIn>', lambda event, entry=self.mobileEntry, text="Enter Your Mobile No.": self.on_click(event, entry, text))
        self.mobileEntry.bind('<FocusOut>', lambda event, entry=self.mobileEntry, text="Enter Your Mobile No.": self.of_click(event, entry, text))
        self.mobileEntry.configure(foreground='grey')

        self.linkedInLabel = Label(root, text='LinkedIn Profile:    ',foreground="blue",font="comicsansms 10 bold").grid(row=8,column=1,sticky='w', pady=10)

        self.liknedInEntry = Entry(root, width=25)
        self.liknedInEntry.grid(row=8, column=2)
        self.liknedInEntry.insert(0, "Your LinkedIn Profile Link")
        self.liknedInEntry.bind('<FocusIn>', lambda event, entry=self.liknedInEntry, text="Your LinkedIn Profile Link": self.on_click(event, entry, text))
        self.liknedInEntry.bind('<FocusOut>', lambda event, entry=self.liknedInEntry, text="Your LinkedIn Profile Link": self.of_click(event, entry, text))
        self.liknedInEntry.configure(foreground='grey')

        submitButton = Button(root, text="Register", command=lambda root=root: self.delimiters(root)
        ).grid(row=9, column=1, columnspan=2, pady=10)

        self.entryDict = {self.nameEntry: "Enter Your Name", self.fatherNameEntry: "Enter Your Father's Name", self.userNameEntry: "Enter Your Email ID", self.passwordEntry: "Enter Your Password", self.rePasswordEntry: "Retype Your Password", self.mobileEntry: "Enter Your Mobile No.", self.liknedInEntry: 'Your LinkedIn Profile Link'}
        



    def on_click(self, event, entry, text):
        if entry.get() == text:
            entry.delete(0, "end")
            entry.configure(foreground='black')
            if entry == self.passwordEntry or entry == self.rePasswordEntry:
                entry.configure(show="*")
            
    def of_click(self, event, entry, text):
        if entry.get() == "":
            entry.insert(0, text)
            entry.configure(foreground='grey')
    
    def delimiters(self, root):
        for key in self.entryDict:
            if key.get() == self.entryDict[key]:
                print(key.get(), self.entryDict[key])
                self.msgs('fillInfo')
                break
        else:
            if self.radioVar.get() == "":
                print(self.radioVar.get())
                self.msgs('gender') 
            elif '@' not in self.userNameEntry.get()[0:(len(self.userNameEntry.get())-1)]:
                self.msgs('userName')
            elif self.passwordEntry.get() != self.rePasswordEntry.get():
                self.msgs('password')
            elif len(self.mobileEntry.get()) != 10 or (not self.mobileEntry.get().isdigit()):
                self.msgs('mobile')
            elif credentials.find_one({"username": self.userNameEntry.get()}) != None:
                self.msgs('userAlreadyExists')
            else:
                print('Data Checking Done')
                self.hashPassword(self.passwordEntry.get())
                self.registerUser(root)
        

    def msgs(self, msg):
        if msg == 'fillInfo':
            ms.showinfo('Details Not Filled', 'Please fill up all the information', icon='error')
        elif msg== 'gender':
            ms.showinfo('Gender Not Filled', 'Please fill the Gender', icon='error')
        elif msg == 'userName':
            ms.showinfo('Invalid UserName', 'Please fill up the Username correctly', icon='error')
        elif msg == 'password':
            ms.showinfo('Password did not match', 'The passwords you entered does not match. Please fill the password again', icon='error')
        elif msg == 'mobile':
            ms.showinfo('Invalid Mobile No.', 'Please fill up the Mobile No. Correctly', icon='error')
        elif msg == 'userAlreadyExists':
            ms.showinfo('User Already Exist', 'The user with the given username already exists. Try logging in to your account', icon='error')

    def hashPassword(self, password):
        result = hashlib.md5(password.encode())
        self.passCode = result.hexdigest()
        print(self.passCode)

    def registerUser(self, root):
        cred = {
            "username": self.userNameEntry.get(),
            "password": self.passCode
        }
        self.id = credentials.insert_one(cred).inserted_id
        det = {
                "username": self.userNameEntry.get(),
                "Name": self.nameEntry.get(),
                "Gender": self.radioVar.get(),
                "Father's Name": self.fatherNameEntry.get(),
                "Mobile No": self.mobileEntry.get(),
                "LinkedIn": self.liknedInEntry.get(),
                "quizzes": [''],
                "attempted": 0,
                "passed": 0
            }
        details.insert_one(det)

        print('Data Uploading Done')
        self.send_mail()

        self.login(root)
    
    def login(self, root):
        if not os.path.exists('__cache__/'):
            os.mkdir('__cache__')
            with open('__cache__/details.txt', 'w') as f:
                f.write(self.userNameEntry.get())
                f.write("\n")
                f.write(self.passCode)
        else:
            with open('__cache__/details.txt', 'w') as f:
                f.write(self.userNameEntry.get())
                f.write("\n")
                f.write(self.passCode)
        username = self.userNameEntry.get()
        root.destroy()
        mainn = Tk()
        main_window = main.Main(mainn, username,True)
    
    def send_mail(self):
        receiver_email = self.userNameEntry.get()
        name = self.nameEntry.get()
        functions.send_email(receiver_email, name)

# if __name__ == '__main__':
#     Register(Tk())
