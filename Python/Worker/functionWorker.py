import os
from functionWorker import *
from BasicMethods import *
from Worker import *
def addWorker():

    list_workers = BasicMethods.readFromFile('workerData.pkl')

    id = BasicMethods.askinteger("id of the new worker: ")
    name = BasicMethods.askstring("name: ")
    surname = BasicMethods.askstring("surname: ")
    email = BasicMethods.askstring("email: ")
    phoneNumber = BasicMethods.askinteger("phone number: ")
    password = BasicMethods.askstring("password: ")
    age = BasicMethods.askstring("age: ")
    salary = BasicMethods.askinteger("salary of the new worker: ")
    position = BasicMethods.askstring("position: ")
    p1 = Worker(id, name, surname, email, phoneNumber, password, age, salary, position)
    list_workers.append(p1)

    for obj in list_workers:
        print(obj.id, end=' ')
        print(obj.nombre, end=' ')
        print(obj.apellido, end=' ')
        print(obj.email, end=' ')
        print(obj.phoneNumber, end=' ')
        print(obj.password, end=' ')
        print(obj.age, end=' ')
        print(obj.salary, end=' ')
        print(obj.position)


    answer = input("Do you want to save changes? Y/N")

    if answer == "y" or answer == "Y":
        filename = "workerData.pkl"
        BasicMethods.addInFile(p1,filename)

    answer = input("Do you want to add a new client? Y/N")

    if answer == "y" or answer == "Y":
        addWorker()

def deleteWorker():
    list_workers = BasicMethods.readFromFile('workerData.pkl')
    i = 0

    for obj in list_workers:
        print(i + 1, end=" ")
        print(obj.id, end=' ')
        print(obj.nombre, end=' ')
        print(obj.apellido, end=' ')
        print(obj.email, end=' ')
        print(obj.phoneNumber, end=' ')
        print(obj.password, end=' ')
        print(obj.age, end=' ')
        print(obj.salary, end=' ')
        print(obj.position)
        i += 1

    numberEvent = int(input("Select the position of the worker: "))

    answer1 = input("Are you sure you want to delete the number " + str(numberEvent) + " worker? Y/N")

    if answer1 == "y" or answer1 == "Y":
        list_workers.pop(numberEvent-1)
        os.remove('workerData.pkl')
        for obj in list_workers:
            BasicMethods.addInFile(obj, "workerData.pkl")

    print("These are the existing workers: ")
    viewWorkerList()




def viewWorkerList():

    list_workers = BasicMethods.readFromFile('workerData.pkl')
    for obj in list_workers:
        print(obj.id, end=' ')
        print(obj.nombre, end=' ')
        print(obj.apellido, end=' ')
        print(obj.email, end=' ')
        print(obj.phoneNumber, end=' ')
        print(obj.password, end=' ')
        print(obj.age, end=' ')
        print(obj.salary, end=' ')
        print(obj.position)

def modifyWorker():
    list_workers = BasicMethods.readFromFile('workerData.pkl')
    i = 0

    for obj in list_workers:
        print(i + 1, end=" ")
        print(obj.id, end=' ')
        print(obj.nombre, end=' ')
        print(obj.apellido, end=' ')
        print(obj.email, end=' ')
        print(obj.phoneNumber, end=' ')
        print(obj.password, end=' ')
        print(obj.age, end=' ')
        print(obj.salary, end=' ')
        print(obj.position)
        i += 1

    numberWorker = int(input("Select the position of the worker: "))
    list_workers[numberWorker - 1].setId()
    list_workers[numberWorker - 1].setName()
    list_workers[numberWorker - 1].setSurname()
    list_workers[numberWorker - 1].setEmail()
    list_workers[numberWorker - 1].setPhoneNumber()
    list_workers[numberWorker - 1].setPassword()
    list_workers[numberWorker - 1].setAge()
    list_workers[numberWorker - 1].setSalary()
    list_workers[numberWorker - 1].setPosition()



    answer1 = input("Do you want to save changes? Y/N")

    if answer1 == "y" or answer1 == "Y":
        os.remove('workerData.pkl')
        for obj in list_workers:
            BasicMethods.addInFile(obj, "workerData.pkl")

    print("This is the updated worker list: ")

    viewWorkerList()

def viewWorkerPosition():

    list_workers = BasicMethods.readFromFile('workerData.pkl')

    i = 0

    for obj in list_workers:
        print(i + 1, end=" ")
        print(obj.nombre, end=' ')
        print(obj.apellido)

        i += 1

    numberWorker = int(input("Select the position of the worker: "))
    print("The position of " + list_workers[numberWorker - 1].getName() + "  is: " + list_workers[numberWorker - 1].getPosition())

    answer = input("Do you want to see other worker's position? Y/N")

    if answer == "Y":
        viewWorkerPosition(list_workers)
    elif answer == "y":
        viewWorkerPosition(list_workers)