create database EntracesExtisEmployees;

-- Allows use the DataBase Created
use EntracesExtisEmployees;

-- Drop DataBase
-- DROP DATABASE IF EXISTS EntracesExtisEmployees;

create table EmployeesRoles
(
Id int auto_increment primary key,
Description varchar(50)
);

create table Employees
(
Id int auto_increment primary key,
NameEmp varchar(50) not null,
FstName varchar(50) not null,
NoEmploye varchar(21844) not null,
Pass varchar(50) not null,
EmployeesRoles_Id int not null,

-- Foreign Key
foreign key (EmployeesRoles_Id) references EmployeesRoles(Id)
);

create table ShiftEntracesExits
(
Employees_Id int,
EntraceRegister datetime not null,
Exitregister datetime,

-- Foreign Keys
foreign key (Employees_Id) references Employees (Id)

);

create table PermisonTypes
(
Id int auto_increment primary key,
Description varchar(25)
);

Create table Permisons
(
Employees_Id int,
PermisonTypes_Id int,
Description varchar(50),
StartDate datetime not null,
EndDate datetime,

-- Foreign Keys
foreign key (Employees_Id) references Employees (Id),
foreign key (PermisonTypes_Id) references PermisonTypes(Id)

);


