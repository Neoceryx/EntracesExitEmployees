
-- Allows use the DataBase Created
use EntracesExtisEmployees;

-- Queries 
insert into EmployeesRoles (Description) values ('Admin'), ('Normal');

-- Reset the auto_increment fields
ALTER TABLE EmployeesRoles AUTO_INCREMENT = 1;

delete from EmployeesRoles where (Id between 1 and 3);

-- Employees Test Registers
Insert into Employees(NameEmp, FstName, NoEmploye, Pass, EmployeesRoles_Id) 
values ('Daniel', 'Fierro', '12345678', 'pass', 1);

Insert into Employees(NameEmp, FstName, NoEmploye, Pass, EmployeesRoles_Id) 
values ('Angel Esteban', 'Fierro', '12345679', 'PASS', 2);

select * from Employees;

-- View User Info
select Employees.Id,NoEmploye,NameEmp, FstName, Pass, EmployeesRoles.Description 
from Employees
inner join EmployeesRoles on (EmployeesRoles_Id = EmployeesRoles.Id);


-- ShiftEntracesExits Test Registers
insert into ShiftEntracesExits(Employees_Id, EntraceRegister, Exitregister) 
values(1,now(), default);

insert into ShiftEntracesExits(Employees_Id, EntraceRegister, Exitregister) 
values(2,now(), default);

-- Get the currebt dateTime
select now();

select * from ShiftEntracesExits;

-- Register EMployee Entrace
insert into ShiftEntracesExits(Employees_Id, EntraceRegister, Exitregister) 
values(1,now(), default);

-- Get Only Date Parte from a DateTime Field
select DATE(EntraceRegister) from ShiftEntracesExits;

-- Register Employee Exit
update ShiftEntracesExits
set Exitregister = now()
where(Exitregister is null and Employees_Id =2);

select * from ShiftEntracesExits;

-- Calculate the difference between the two times
SELECT TIMEDIFF('2009-05-18 15:45:50','2009-05-18 15:40:50'); 

select TIMEDIFF(EntraceRegister,Exitregister) from ShiftEntracesExits; 

-- Display the Entrances and Exits Report
select  Employees.NameEmp, Employees.FstName, Employees.NoEmploye, EntraceRegister, Exitregister, TIMEDIFF(EntraceRegister,Exitregister) as 'Time Needed'
from  ShiftEntracesExits inner join Employees on (Employees_Id = Id);

describe Employees;

-- Get only date parte from a Datetime field
select DATE(now());

-- Select Only time part from a DateTime Field
select TIME(now());

-- Get the Entrances and Extis whit the current Date
select  Employees.NameEmp, Employees.FstName, Employees.NoEmploye, EntraceRegister, Exitregister, TIMEDIFF(EntraceRegister,Exitregister) as 'Time Needed'
from  ShiftEntracesExits inner join Employees on (Employees_Id = Id)
where(DATE(ShiftEntracesExits.EntraceRegister) = DATE(now()) );

select * from Employees;

-- Get the Employe Id by NoEmployee
select Id from Employees where(NoEmploye = 12345678);

-- Add Employee Enrance
insert into shiftentracesexits values (1,Now(), default);

select * from shiftentracesexits;
describe shiftentracesexits;

-- Add Employe exit
update shiftentracesexits
set Exitregister = now()
where (Employees_Id = 2 and Exitregister is null);


select * from shiftentracesexits
where (DATE(EntraceRegister) = Date(now()));

DELETE from shiftentracesexits
where ( Exitregister is null and Employees_Id = 1 );

select * from shiftentracesexits
where ( Exitregister is null );

-- ===================================== Login =====================================

-- Get User role in the login
SELECT NameEmp, FstName,EmployeesRoles_Id, employeesroles.Description FROM employees
inner join employeesroles on (EmployeesRoles_Id = employeesroles.Id)
where (NoEmploye = '12345678' and Pass='pass');

-- Validate Employe exits
select count(*) from employees
where (NoEmploye = '12345678' and Pass='pass');

-- if retrun 1 then employee exists esle employee don't exists

describe employees;
select * from employees;
-- ===================================== Login =====================================

-- ===================================== EnrancesEmployees Report =====================================

-- Get Entrances report by dateRange
SELECT employees.Id, employees.NameEmp,employees.FstName, employees.NoEmploye ,EntraceRegister,Exitregister
, TIMEDIFF(Exitregister,EntraceRegister) as 'TimeNeeded'
FROM shiftentracesexits
INNER JOIN employees ON (Employees_id = employees.Id)
WHERE (DATE(EntraceRegister) BETWEEN '2017-06-16' AND '2017-06-21' );

-- ===================================== EnrancesEmployees Report =====================================

-- ===================================== Register New Employee =====================================

-- validate if the employee is nor registerd
SELECT COUNT(*) FROM employees WHERE (NoEmploye= 12345678912);

-- Add New Employee
insert into employees (NameEmp,FstName,NoEmploye,Pass,EmployeesRoles_Id) 
values ('Jazmin', 'Martinez', '123456789', '1234', 1 );

select * from employees;
select * from employeesRoles;

delete from employees where (Id between 4 and 5);

describe employees;

-- reset the autoincrement counter
ALTER TABLE employees AUTO_INCREMENT = 4;

-- ===================================== Register New Employee =====================================