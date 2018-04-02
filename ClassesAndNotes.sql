#create table classes (classID varchar(8) PRIMARY KEY, className varchar(64) NOT NULL);
/*
drop table notes;
create table notes (notesID int unsigned PRIMARY KEY auto_increment,
	classID varchar(8),
    notesName varchar(64) NOT NULL,
    professorName varchar(64),
    sectionName varchar(16),
    dateCreated datetime,
    filePath varchar(192),
    foreign key (classID) references classes(classID));
*/
 
/*
delimiter //
drop procedure addNote//
create procedure addNote(cID varchar (8), nN varchar(64), pN varchar(64), sN varchar(16), fP varchar(192))
begin

	insert into notes(classID, notesName, professorName, sectionName, dateCreated, filePath) values (
		cID, nN, pN, sN, current_timestamp(), fP);

end//
*/

delimiter //
#drop function addClass//
#This adds a class to the classes table, returns 1 if it works out 0 if the class already exists.
create function addClass(cID varchar(8), cN varchar(64)) returns int
deterministic
begin

	if(select exists(select classID from classes where classID = cID) limit 1) then
		return (0);
    end if;
	
    insert into classes(classID, className) values (cID, cN);
    return (1);
    
end//

