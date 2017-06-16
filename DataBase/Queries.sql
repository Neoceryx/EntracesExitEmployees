
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