from tkinter import *
from tkinter.ttk import *
from tkinter import ttk
import tkinter.messagebox as ms
import hashlib
from pymongo import MongoClient
import os

import main
import Passwords

class Login(Frame):
    def __init__(self, root):
        root.maxsize(600, 300)
        root.minsize(600, 300)
        root.title('Sign In')
        Frame.__init__(self)
        self.grid()
        self.login(root)
        # root.mainloop()

    def login(self, root):
        spacing = Label(root, width=25).grid(row=0, column=0, pady=50)

        user_label = Label(root, text="Username:     ", foreground="blue",font="comicsansms 10 bold").grid(row=1, column=1)

        self.usernameEntry = Entry(root,width=35)
        self.usernameEntry.grid(row=1, column=2)
        self.usernameEntry.insert(0, "Enter Your Username")
        self.usernameEntry.bind('<FocusIn>', lambda event, entry=self.usernameEntry, text="Enter Your Username": self.on_click(event, entry, text))
        self.usernameEntry.bind('<FocusOut>', lambda event, entry=self.usernameEntry, text="Enter Your Username": self.of_click(event, entry, text))
        self.usernameEntry.configure(foreground='grey')

        password_label = Label(root, text="Password:     ", foreground="blue",font="comicsansms 10 bold").grid(row=2, column=1)

        self.passwordEntry = Entry(root, width=35)
        self.passwordEntry.grid(row=2, column=2)
        self.passwordEntry.insert(0, "Enter Your Password")
        self.passwordEntry.bind('<FocusIn>', lambda event, entry=self.passwordEntry, text="Enter Your Password": self.on_click(event, entry, text))
        self.passwordEntry.bind('<FocusOut>', lambda event, entry=self.passwordEntry, text="Enter Your Password": self.of_click(event, entry, text))
        self.passwordEntry.configure(foreground='grey')

        button = Button(root, text="Login", command=lambda root=root: self.loginPressed(root)).grid(row=3, column=1, columnspan=2)

        spacing1 = Label(root,width=25).grid(row=3, column=3, pady=50)

    def on_click(self, event, entry, text):
        if entry.get() == text:
            entry.delete(0, "end")
            entry.configure(foreground='black')
            if entry == self.passwordEntry:
                entry.configure(show="*")
            
    def of_click(self, event, entry, text):
        if entry.get() == "":
            entry.insert(0, text)
            entry.configure(foreground='grey')

    def hashPassword(self, password):
        result = hashlib.md5(password.encode())
        self.passCode = result.hexdigest()
        print(self.passCode)

    def search_credentials(self, root):
        client = MongoClient(Passwords.MONGO_URI)
        db = client['Student-db']
        credentials = db.credentials
        username = self.usernameEntry.get()
        if credentials.find_one({"username": username})!= None:
            dict = credentials.find_one({"username": username})
            if self.passCode == dict["password"]:
                if not os.path.exists('__cache__/'):
                    os.mkdir('__cache__')
                    with open('__cache__/details.txt', 'w') as f:
                        f.write(username)
                        f.write("\n")
                        f.write(self.passCode)
                else:
                    with open('__cache__/details.txt', 'w') as f:
                        f.write(username)
                        f.write("\n")
                        f.write(self.passCode)
                root.destroy()
                mainn = Tk()
                main_window = main.Main(mainn,dict['username'], True)
            else:
                self.msgs('wrongPass')
        else:
            self.msgs('userNotFound')

    def msgs(self, msg):
        if msg == 'userNotFound':
            ms.showinfo('Wrong Username', 'Sorry the user with the given username not found.', icon='error')
        elif msg == 'wrongPass':
            ms.showinfo('Incorrect Password', 'Please fill up the password correctly', icon='error')

    def loginPressed(self, root):
        self.hashPassword(self.passwordEntry.get())
        self.search_credentials(root)

# if __name__ == '__main__':
#     Login(Tk())
