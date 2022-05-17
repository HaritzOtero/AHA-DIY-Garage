from functionWorker import *

option = int

while option != 6:
    print("MANAGE WORKERS")
    print("==================================================")
    print("1--Add worker")
    print("2--Delete worker")
    print("3--View worker list")
    print("4--Modify worker")
    print("5--View worker Position")
    print("6--Exit")

    option = int(input("Enter the number of an option from the menu: "))
    if option == 1:
        addWorker()
    if option == 2:
        deleteWorker()
    if option == 3:
        viewWorkerList()
    if option == 4:
        modifyWorker()
    if option == 5:
        viewWorkerPosition()

