-- однокурсников со средним баллом от .. до .., и именем %name%
-- соответвенно значения полей можно менять
SELECT
		students.first_name,
		students.last_name,
		results_students_subject.id_student,
		FORMAT(AVG(
				results_students_subject.result
		),2) AS avg_result,
		learning_group.group_code
FROM
		results_students_subject
JOIN students ON results_students_subject.id_student = students.id
JOIN group_students ON students.id = group_students.id_student
JOIN learning_group_years ON group_students.id_group = learning_group_years.id
JOIN learning_group ON learning_group_years.id_group = learning_group.id
GROUP BY results_students_subject.id_student, learning_group.group_code
HAVING avg_result BETWEEN 59 AND 65 AND students.first_name LIKE '%Олес%' AND group_code = '5СИ-1'

-- всех людей, c IP которых произошло более одной регистрации, и при этом хотя бы 
-- у одного из них должна быть написана характеристика научного руководителя
SELECT students.first_name, students.last_name
 FROM students WHERE students.ip_student IN (
        SELECT
            students.ip_student AS ip_student
        FROM
            students
        GROUP BY
            students.ip_student
        HAVING
            COUNT(students.ip_student) > 1
    )
AND NOT ISNULL(students.description)
-- или воспользоватлься представлением vAllStudentWithDescriptionAndOneIP