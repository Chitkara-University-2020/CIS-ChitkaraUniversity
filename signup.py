from tkinter import *
from tkinter.ttk import *
import os
from pymongo import MongoClient

import loginPage
import registerPage
import main
import Passwords

class Signup(Frame):
    def __init__(self,root):
        root.maxsize(200, 200)
        root.minsize(200, 200)
        root.title('Login/Signup')
        Frame.__init__(self)
        self.grid()
        self.signup(root)
        root.mainloop()

    def signup(self, root):
        spacing = Label(root, width=10).grid(row=0,column=0,pady=25)
        Signin = Button(root, text="Sign In", command=lambda root=root: self.signin(root)).grid(row=1, column=1)
        Signup = Button(root, text="Sign Up", command=lambda root=root: self.register(root)).grid(row=2, column=1)
    
    def signin(self, root):
        root.destroy()
        signin = Tk()
        signin_window = loginPage.Login(signin)
    
    def register(self, root):
        root.destroy()
        signup = Tk()
        signup_window = registerPage.Register(signup)


if __name__ == "__main__":
    if os.path.exists('__cache__/details.txt'):
        username = ""
        password = ""
        with open('__cache__/details.txt') as f:
            while True:
                char = f.read(1)
                if char != '\n':
                    username += char
                else:
                    break
            password = f.read()
            print(username, password)
        client = MongoClient(Passwords.MONGO_URI)
        db = client['Student-db']
        credentials = db.credentials
        if credentials.find_one({"username": username})!= None:
            dict = credentials.find_one({"username": username})
            if password == dict["password"]:
                mainn = Tk()
                main_window = main.Main(mainn, dict['username'], True)
            else:
                Signup(Tk())
        else:
            Signup(Tk())


    else:
        Signup(Tk())
