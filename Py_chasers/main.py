from tkinter import *
from tkinter.ttk import *
from tkinter import ttk
from pymongo import MongoClient
import tkinter.messagebox as ms
import webbrowser
import shutil

import Passwords
import post
import signup

client = MongoClient(Passwords.MONGO_URI)
db = client['Jobs-db']
jobs = db.jobs

db_det = client['Student-db']
details= db_det.details

db_resources = client['Resources-db']
Resources = db_resources.resources

db_quiz = client['Quiz-db']

passingMarks_db = client['PassingMarks-db']



class Main(Frame):
    def __init__(self,root, username,loop=False):
        self.username = username

        root.maxsize(600, 600)
        root.minsize(600, 600)
        root.title('Main Page')
        root.configure(background='blue')
        
        s = Style()
        s.configure('My.TFrame', background='blue', foreground='white')
        s.configure('TRadiobutton', font='comiscsansms 10')

        Frame.__init__(self)
        self.grid()
        tabControl = ttk.Notebook(self)
        tabControl.configure(width=595, height=560)

        # Initializing Tab 1 --- "Job Finder Tab"
        self.tab1 = ttk.Frame(tabControl)
        tabControl.add(self.tab1, text="Job Finder")
        tabControl.grid()
        self.tab1.configure(style='My.TFrame') 
     
        
        # Initializing Tab 2 --- "Job Finder Tab"
        self.tab2 = ttk.Frame(tabControl)
        tabControl.add(self.tab2, text="Resource Finder")
        tabControl.grid()
        self.tab2.configure(style='TFrame')        
        
        # Initializing Tab 3 --- "Job Finder Tab"
        self.tab3 = ttk.Frame(tabControl)
        tabControl.add(self.tab3, text="Quiz Section")
        tabControl.grid()
        self.tab3.configure(style='TFrame')        
       
        # Initializing Tab 4 --- "Profile Tab"
        self.tab4 = ttk.Frame(tabControl)
        tabControl.add(self.tab4, text="My Profile")
        tabControl.grid()
        self.tab4.configure(style='My.TFrame')        
        
        self.t1(root)
        self.t2(root)
        self.t3(root)
        self.t4(root)

        if loop:
            root.mainloop()

    def callback(self, url):
        print(url)
        webbrowser.open_new(url)

    def canvas(self, parent):
        canvas = Canvas(parent,bg='blue')
        return canvas, Scrollbar(parent, orient="vertical", command=canvas.yview), Frame(canvas, style='My.TFrame')

    def canvas_pack(self, canvas, scroll_y, frame):
        canvas.create_window(0, 0, anchor='nw', window=frame)
        canvas.update_idletasks()

        canvas.configure(scrollregion=canvas.bbox('all'), yscrollcommand=scroll_y.set)
        canvas.pack(fill='both', expand=True, side='left')
        scroll_y.pack(fill='y', side='right')

# <------------------------------------------   TAB 1 ----------------------------------------------------->  
    def initialBuild_t1(self):
        self.canva_t1, self.scroll_y_t1, self.frame_t1 = self.canvas(self.tab1)

        start = Label(self.frame_t1, text="Job Finder", font="comicsansms 30 bold", foreground='blue', background='yellow')
        start.grid(row=0, column=3, pady=15, padx=6, sticky='w')

        postJobButton = Button(self.frame_t1,text="Post New Job", command=self.postJob).grid(row=0, column=4)
        
        search_frame = Frame(self.frame_t1, style='My.TFrame')
        search_frame.grid(row=1, column=0, columnspan=5)
        
        search_label = Label(search_frame, text='Search Job: ', font='sanscomicms 20 bold', background='blue').grid(row=0, column=0)
        
        self.searchJobVar=StringVar()
        self.searchEntry=Entry(search_frame,textvariable=self.searchJobVar,font="comicsansms 20").grid(row=0, column=1)

        searchButton = Button(search_frame, text="Search", command=self.search_t1).grid(row=0, column=2, padx=20)

        self.content_frame_t1 = Frame(self.frame_t1,style='My.TFrame')
        self.content_frame_t1.grid(row=3, column=0, columnspan=5)


    def t1(self, root):

        self.initialBuild_t1()

        job_dict = {'Python': jobs.find_one({'langNeeded': 'Python'}), 'JavaScript': jobs.find_one({'langNeeded': 'Javascript'}), 'Java': jobs.find_one({'langNeeded': 'Java'}), 'Flutter': jobs.find_one({'langNeeded': 'Flutter'})}

        row = 0
        self.popularJobs = Label(self.content_frame_t1, text="Popular Jobs", font='comicsansms 20', background='#FF5B94')
        self.popularJobs.grid(row=row, column=1, pady=20)
        row += 1
        for dict in job_dict:
            self.label = Label(self.content_frame_t1, text=f"{job_dict[dict]['name']} - {job_dict[dict]['company']}", font='comicsansms 15', background='#FBCE66')
            self.label.grid(row=row, column=1, pady=20)
            row += 1 
            self.description = Text(self.content_frame_t1, height=(len(job_dict[dict]['description'])+125)//58, width=58, wrap=WORD, bg='blue', borderwidth=0, fg='white', font='comicsansms 12')
            self.description.grid(row=row, column=0, columnspan=3)
            self.description.insert(0.0,job_dict[dict]['description'])
            self.description.configure(state=DISABLED)
            row += 1 
            self.applyNow = Button(self.content_frame_t1, text='Apply Now')
            self.applyNow.grid(row=row, column=1, pady=20)
            row += 1

        self.canvas_pack(self.canva_t1, self.scroll_y_t1, self.frame_t1)


    def postJob(self):
        postJobs = Toplevel(self)
        postJobWindow = post.PostJob(postJobs)


    def search_t1(self):
        lang = self.searchJobVar.get()
        if lang == "":
            ms.showinfo('Invalid Search', 'Pls enter the value to search', icon='error')
            return -1
        result = jobs.find({'langNeeded': lang})
        resultDict = {}
        id = 1
        for x in result:
            resultDict[id] = x
            id += 1

        self.canva_t1.destroy()
        self.scroll_y_t1.destroy()

        self.initialBuild_t1()
        
        row = 0
        if resultDict != {}:
            for dict in resultDict:
                self.label = Label(self.content_frame_t1, text=f"{resultDict[dict]['name']} - {resultDict[dict]['company']}", font='comicsansms 15', background='#FBCE66')
                self.label.grid(row=row, column=1, pady=20)
                row += 1
                self.description = Text(self.content_frame_t1, height=(len(resultDict[dict]['description'])+125)//58, width=58, wrap=WORD, bg='blue', borderwidth=0, fg='white', font='comicsansms 12')
                self.description.grid(row=row, column=0, columnspan=3)
                self.description.insert(0.0,resultDict[dict]['description'])
                self.description.configure(state=DISABLED)
                row += 1 
                self.applyNow = Button(self.content_frame_t1, text='Apply Now')
                self.applyNow.grid(row=row, column=1, pady=20)
                row += 1
        else:
            Label(self.content_frame_t1, text='New Jobs Coming Soon', font='comicsansms 20 bold', background='blue').grid(row=0, column=1, pady=100, padx=100)

        self.canvas_pack(self.canva_t1, self.scroll_y_t1, self.frame_t1)

# <------------------------------------------   TAB 2 ----------------------------------------------------->  
    def initialBuild_t2(self):
        self.canva_t2, self.scroll_y_t2, self.frame_t2 = self.canvas(self.tab2)

        start = Label(self.frame_t2, text="Resource Finder", font="comicsansms 30 bold", foreground='blue', background='yellow')
        start.grid(row=0, column=3, pady=15, padx=6, sticky='w')

        postContentButton = Button(self.frame_t2,text="Post New Resource", command=self.postResources).grid(row=0, column=4)
        
        search_frame = Frame(self.frame_t2, style='My.TFrame')
        search_frame.grid(row=1, column=0, columnspan=5)
        
        search_label = Label(search_frame, text='Search Resources: ', font='sanscomicms 16 bold', background='blue').grid(row=0, column=0)
        
        self.searchResourcesVar=StringVar()
        self.searchEntry=Entry(search_frame,textvariable=self.searchResourcesVar,font="comicsansms 16").grid(row=0, column=1)

        searchButton = Button(search_frame, text="Search", command=self.search_t2).grid(row=0, column=2, padx=20)

        self.content_frame_t2 = Frame(self.frame_t2,style='My.TFrame')
        self.content_frame_t2.grid(row=3, column=0, columnspan=5)
    
    def t2(self, root):
        self.initialBuild_t2()
        self.canvas_pack(self.canva_t2, self.scroll_y_t2, self.frame_t2)

    def postResources(self):
        postResources = Toplevel(self)
        postResourcesWindow = post.PostResources(postResources)

    def search_t2(self):
        topic = self.searchResourcesVar.get()
        if topic == "":
            ms.showinfo('Invalid Search', 'Pls enter the value to search', icon='error')
            return -1
        result = Resources.find({'langName': topic})
        resultDict = {}
        print(resultDict)
        id = 1
        for x in result:
            resultDict[id] = x
            id += 1

        self.canva_t2.destroy()
        self.scroll_y_t2.destroy()

        self.initialBuild_t2()
        
        row = 0
        if resultDict != {}:
            Label(self.content_frame_t2, text=topic, font='comicsansms 20', background='#FF5B94').grid(row=row, column=1, pady=10)
            row += 1
            for dict in resultDict:
                self.resourceName = Label(self.content_frame_t2, text=resultDict[dict]['resourceName'], font='comicsansms 15', background='#FBCE66')
                self.resourceName.grid(row=row, column=1, pady=20)
                row += 1
                resourceLink = Text(self.content_frame_t2, height=(len(resultDict[dict]['resourceLink'])+25)//58, width=58, wrap=WORD, bg='blue', borderwidth=0, fg='white', font='comicsansms 12')
                resourceLink.grid(row=row, column=0, columnspan=3, pady=10)
                resourceLink.insert(0.0, resultDict[dict]['resourceLink'])
                resourceLink.bind("<Button-1>", lambda e, url=resultDict[dict]['resourceLink']: self.callback(url))
                resourceLink.configure(state=DISABLED, cursor='hand2')
                row += 1

        else:
            Label(self.content_frame_t2, text='New Resources Coming Soon', font='comicsansms 20 bold', background='blue').grid(row=0, column=1, pady=100, padx=100)
        

        self.canvas_pack(self.canva_t2, self.scroll_y_t2, self.frame_t2)

# <------------------------------------------   TAB 3 ----------------------------------------------------->     
    def initialBuild_t3(self, root):
        self.canva_t3, self.scroll_y_t3, self.frame_t3 = self.canvas(self.tab3)

        start = Label(self.frame_t3, text="Quiz Section", font="comicsansms 30 bold", foreground='blue', background='yellow')
        start.grid(row=0, column=3, pady=15, padx=6, sticky='w')
            
        search_frame = Frame(self.frame_t3, style='My.TFrame')
        search_frame.grid(row=1, column=0, columnspan=5)
            
        search_label = Label(search_frame, text='Search A Quiz: ', font='sanscomicms 18 bold', background='blue').grid(row=0, column=0)
            
        self.searchQuizVar=StringVar()
        self.searchEntry=Entry(search_frame,textvariable=self.searchQuizVar,font="comicsansms 18").grid(row=0, column=1)

        searchButton = Button(search_frame, text="Search", command=lambda root=root :self.search_t3(root)).grid(row=0, column=2, padx=20)

        self.content_frame_t3 = Frame(self.frame_t3,style='My.TFrame')
        self.content_frame_t3.grid(row=3, column=0, columnspan=5)

    def t3(self, root):
        self.initialBuild_t3(root)
        self.canvas_pack(self.canva_t3, self.scroll_y_t3, self.frame_t3)

    def search_t3(self, root):
        topic = self.searchQuizVar.get()
        tp = topic.lower()
        collection = ""
        if topic == "":
            ms.showinfo('Invalid Search', 'Pls enter the value to search', icon='error')
            return -1

        self.canva_t3.destroy()
        self.scroll_y_t3.destroy()

        self.initialBuild_t3(root)

        if topic.lower() not in db_quiz.list_collection_names():
            Label(self.content_frame_t3, text='New Quizzes Coming Soon', font='comicsansms 20 bold', background='blue').grid(row=0, column=1, pady=100, padx=100)

            self.canvas_pack(self.canva_t3, self.scroll_y_t3, self.frame_t3)

            return -1
        else:
            collection = db_quiz[tp]

        result = collection.find({})
        resultDict = {}
        id = 1
        for x in result:
            resultDict[id] = x
            id += 1
        
        row = 0
        self.user_ans = {}
        self.answers = {}
        for dict in resultDict:
            id = str(resultDict[dict]['id'])
            self.answers[id] = resultDict[dict]['answer']
        self.scores = {}
        if resultDict != {}:
            Label(self.content_frame_t3, text=topic.capitalize(), font='comicsansms 20', background='#FF5B94').grid(row=row, column=2, pady=10)
            row += 1
            for dict in resultDict:
                Label(self.content_frame_t3, text=resultDict[dict]['id'], font='comicsansms 15', background='#FBCE66').grid(row=row, column=0, pady=10, padx=10)
                question = Text(self.content_frame_t3, font='comicsansms 15', height=2, width=40, wrap=WORD, bg='blue', borderwidth=0, fg='white')
                question.grid(row=row, column=1, pady=10, columnspan=3)
                question.insert(0.0, resultDict[dict]['question'])
                question.configure(state=DISABLED)
                row += 1
                if resultDict[dict]['isCode']:
                    code = Text(self.content_frame_t3, font='comicsansms 15', height=2, width=20, wrap=WORD, bg='blue', borderwidth=0, fg='black')
                    code.grid(row=row, column=1, pady=10, columnspan=2)
                    code.insert(0.0, resultDict[dict]['code'])
                    code.configure(state=DISABLED)
                    row += 1
                radioVar = IntVar()
                for i in range(resultDict[dict]['options']):
                    opt = chr(97 + i)
                    Radiobutton(self.content_frame_t3, text=resultDict[dict][opt], variable=radioVar, value=i+1, style='TRadiobutton', command=lambda val=i+1, id=resultDict[dict]['id']: self.checkAnswer(val, id)).grid(row=row, column=1,pady=8, sticky='w')
                    row += 1
            Button(self.content_frame_t3, text='Submit Answers', command=lambda topic=tp, root=root: self.checkResult(topic, root)).grid(row=row, column=1,pady=8)
            

                    
        else:
            Label(self.content_frame_t2, text='New Resources Coming Soon', font='comicsansms 20 bold', background='blue').grid(row=0, column=1, pady=100, padx=100)
        

        self.canvas_pack(self.canva_t3, self.scroll_y_t3, self.frame_t3)
    
    def checkAnswer(self, val, id):
        print(val, id)
        self.user_ans[str(id)] = val
        if self.user_ans[str(id)] == self.answers[str(id)]:
            print('Correct answer')
            self.scores[str(id)] = 1
        else:
            print('Wrong Answer')
            self.scores[str(id)] = 0
        print(self.scores)
    
    def checkResult(self, topic, root):
        score = 0
        for key in self.scores:
            score += self.scores[key]
        collection = passingMarks_db[topic]
        passingMarks = collection.find_one({'id': topic})['minMarks']
        
        isAttempted = False
        dict = details.find_one({'username': self.username})
        if topic in dict['quizzes']:
            isAttempted = True
        
        print(score)
        self.scores = {}
        if not isAttempted:
            if score >= passingMarks:
                dict['quizzes'].append(topic)
                dict['attempted'] += 1
                dict['passed'] += 1
                details.update({'username': self.username}, dict)
                ms.showinfo('Successfully Passed Quiz', 'Congratuations! You have Passed the Quiz Successfully')
                self.canva_t3.destroy()
                self.scroll_y_t3.destroy()
                self.t3(root)
                self.t4(root)
            else:
                dict['attempted'] += 1
                details.update({'username': self.username}, dict)
                ms.showinfo('Quiz Failed', 'OOPS!! You have Failed the Quiz. You can Try Again.')
                self.canva_t3.destroy()
                self.scroll_y_t3.destroy()
                self.t3(root)
                self.t4(root)
        else:
            if score >= passingMarks:
                ms.showinfo('Successfully Passed Quiz', 'Congratuations! You have Passed the Quiz Successfully')
                self.canva_t3.destroy()
                self.scroll_y_t3.destroy()
                self.t3(root)
                self.t4(root)
            else:
                ms.showinfo('Quiz Failed', 'OOPS!! You have Failed the Quiz. You can Try Again.')
                self.canva_t3.destroy()
                self.scroll_y_t3.destroy()
                self.t3(root)
                self.t4(root)
        
        



# <------------------------------------------   TAB 4 ----------------------------------------------------->  
    def t4(self, root):
        
        det = details.find_one({'username': self.username})
        print(det)

        start = Label(self.tab4, text="Your Profile", font="comicsansms 30 bold", foreground='blue', background='yellow')
        start.grid(row=0, column=2, pady=15, padx=6, sticky='w')

        Label(self.tab4, text='Name:',  font='sanscomicms 20 bold', background='blue').grid(row=1, column=0, sticky='w', padx=20)
        Label(self.tab4, text=det['Name'], font='sanscomicms 20 bold').grid(row=1, column=2,pady=10,sticky='w')

        Label(self.tab4, text='Gender:',  font='sanscomicms 20 bold', background='blue').grid(row=2, column=0, sticky='w', padx=20)
        Label(self.tab4, text=det['Gender'], font='sanscomicms 20 bold').grid(row=2, column=2,pady=10,sticky='w')

        Label(self.tab4, text='Father\'s Name:',  font='sanscomicms 20 bold', background='blue').grid(row=3, column=0, sticky='w', padx=20)
        Label(self.tab4, text=det['Father\'s Name'], font='sanscomicms 20 bold').grid(row=3, column=2,pady=10,sticky='w')

        Label(self.tab4, text='Mobile No.:',  font='sanscomicms 20 bold', background='blue').grid(row=4, column=0, sticky='w', padx=20)
        Label(self.tab4, text=det['Mobile No'], font='sanscomicms 20 bold').grid(row=4, column=2,pady=10,sticky='w')

        Label(self.tab4, text='Username:',  font='sanscomicms 20 bold', background='blue').grid(row=5, column=0, sticky='w', padx=20)
        Label(self.tab4, text=det['username'], font='sanscomicms 15 bold').grid(row=5, column=2,pady=10,sticky='w')

        Label(self.tab4, text='LinkedIn Profile:',  font='sanscomicms 20 bold', background='blue').grid(row=6, column=0, sticky='w', padx=20)
        h = Label(self.tab4, text=det['LinkedIn'], font='sanscomicms 10 bold', cursor='hand2')
        h.grid(row=6, column=2,pady=10,sticky='w')
        h.bind("<Button-1>", lambda e: self.callback(det['LinkedIn']))

        Label(self.tab4, text='Total Quizzes Attempted:',  font='sanscomicms 12 bold', background='blue').grid(row=7, column=0, sticky='w', padx=20)
        Label(self.tab4, text=det['attempted'], font='sanscomicms 20 bold').grid(row=7, column=2,pady=10,sticky='w')

        Label(self.tab4, text='Total Quizzes Passed:',  font='sanscomicms 12 bold', background='blue').grid(row=8, column=0, sticky='w', padx=20)
        Label(self.tab4, text=det['passed'], font='sanscomicms 20 bold').grid(row=8, column=2,pady=10,sticky='w')

        Button(self.tab4, text='Sign Out', command=lambda root=root: self.signout(root)).grid(row=9, column=2,pady=10)

    def signout(self, root):
        try:
            shutil.rmtree('__cache__')
        except Exception as e:
            print('Cache was not Present')
        root.destroy()
        Signup = Tk()
        Signup_window = signup.Signup(Signup)
        


if __name__ == '__main__':
    Main(Tk(),'reenajain.rj10051976@gmail.com', True)