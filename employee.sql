/*Напишите запрос для вывода списка сотрудников, у которых заработная плата выше, чем у руководителя.*/

SELECT e1.Name AS EmployeeName, e1.Salary AS EmployeeSalary, e2.Name AS ChiefName, e2.Salary AS ChiefSalary
FROM EMPLOYEES e1
JOIN EMPLOYEES e2 ON e1.ChiefId = e2.EmployeeId
WHERE e1.Salary > e2.Salary;


/*Напишите запрос для вывода списка названий отделов, где количество сотрудников не превышает 3-х человек,*/
SELECT Department
FROM EMPLOYEES
GROUP BY Department
HAVING COUNT(*) <= 3;
