from tkinter import *
from tkinter.ttk import *
from tkinter import ttk
import tkinter.messagebox as ms
from pymongo import MongoClient

import Passwords

client = MongoClient(Passwords.MONGO_URI)
db = client['Jobs-db']
jobs = db.jobs

db_resources = client['Resources-db']
Resources = db_resources.resources


class PostJob(Frame):
    def __init__(self, root):
        root.title('Post New Job')
        root.minsize(650,600)    
        root.maxsize(650,600)    
        Frame.__init__(self)

        self.postJobGUI(root)

        # root.mainloop()
    
    def postJobGUI(self, root):
        Label(root, text="Post a New Job", font="comicsansms 30 bold", foreground='blue', background='yellow').grid(row=0, column=1, pady=15, padx=6, sticky='w')

        Label(root, text="Job Name:  ", font='sanscomicms 20 bold').grid(row=1, column=0, sticky='w')
        
        self.name = Entry(root, font="comicsansms 20")
        self.name.grid(row=1, column=1, pady=10)

        Label(root, text="Company Name:  ", font="comicsansms 20 bold").grid(row=2, column=0, sticky='w')

        self.company = Entry(root, font="comicsansms 20")
        self.company.grid(row=2, column=1, pady=10)

        Label(root, text="Language Needed:  ", font="comicsansms 20 bold").grid(row=3, column=0, sticky='w')

        self.langNeeded = Entry(root, font="comicsansms 20")
        self.langNeeded.grid(row=3, column=1, pady=10)

        Label(root, text="Job Description:  ", font="comicsansms 20 bold").grid(row=4, column=0, sticky='w')

        self.desc = Text(root, width=40, height=15, wrap=WORD)
        self.desc.grid(row=4, column=1, pady=10)

        postButton = Button(root, text="Post Job", command=lambda root=root: self.postJob(root)).grid(row=5, column=1, sticky='w', pady=10)

    def postJob(self, root):
        
        if self.langNeeded.get() != "" and self.name.get() != "" and self.company.get() != "" and self.desc.get(0.0, END) != "": 
            job = {'langNeeded':self.langNeeded.get(), 'name':self.name.get(), 'company': self.company.get(), 'description': self.desc.get(0.0, END)}

            if jobs.find_one({'langNeeded': self.langNeeded.get(), 'name': self.name.get(), 'company': self.company.get()}) == None:
                jobs.insert_one(job)
                print("data Uploaded")
                ms.showinfo('Success', 'Data Uploaded Successfully')
                root.destroy()
            else:
                ms.showinfo('Failed', 'The data you entered already exists')
        else:
            ms.showinfo('Details not filled', 'Please fill up all the details', icon='error')

class PostResources(Frame):
    def __init__(self, root):
        root.title('Post New Resource')
        root.minsize(650,600)    
        root.maxsize(650,600)    
        Frame.__init__(self)

        self.postResourcesGUI(root)

        # root.mainloop()
    
    def postResourcesGUI(self, root):
        Label(root, text="Post a New Resource", font="comicsansms 25 bold", foreground='blue', background='yellow').grid(row=0, column=1, pady=15, padx=6, sticky='w')

        Label(root, text="Topic Name:  ", font='comicsansms 20 bold').grid(row=1, column=0, sticky='w')
        
        self.topicName = Entry(root, font="comicsansms 20")
        self.topicName.grid(row=1, column=1, pady=10)
        
        Label(root, text="Resource Name:  ", font='comicsansms 20 bold').grid(row=2, column=0, sticky='w')

        self.resourceName = Entry(root, font="comicsansms 20")
        self.resourceName.grid(row=2, column=1, pady=10)

        Label(root, text="Resource Link:  ", font="comicsansms 20 bold").grid(row=3, column=0, sticky='w')

        self.resourceLink = Entry(root, font="comicsansms 20")
        self.resourceLink.grid(row=3, column=1, pady=10)

        postButton = Button(root, text="Post Resource", command=lambda root=root: self.postResources(root)).grid(row=4, column=1, sticky='w', pady=10)

    def postResources(self, root):
        
        if self.topicName.get() != "" and self.resourceName.get() != "" and self.resourceLink.get() != "":
            resource = {'langName': self.topicName.get(), 'resourceName': self.resourceName.get(), 'resourceLink': self.resourceLink.get()}

            if Resources.find_one({'langName': self.topicName.get(), 'resourceName': self.resourceName.get(),'resourceLink': self.resourceLink.get()}) == None:
                Resources.insert_one(resource)
                print("data Uploaded")
                ms.showinfo('Success', 'Data Uploaded Successfully')
                root.destroy()
            else:
                ms.showinfo('Failed', 'The data you entered already exists')
        else:
            ms.showinfo('Details not filled', 'Please fill up all the details', icon='error')


# if __name__ == '__main__':
#     PostJob(Tk())
#     PostResources(Tk())