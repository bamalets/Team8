#create table users (uName varchar(16) PRIMARY KEY, uPass varchar(32) NOT NULL);

/*
delimiter //
drop function qLogin//
create function qLogin(uN varchar(16), uP varchar(32)) returns boolean
	deterministic
    begin
		declare loggedin boolean;
        declare uneUP varchar(32);
        set uneUP = decode(uP, 'fub');
        set loggedin = false;
        
        if(select exists(select uName from users where uN = uName limit 1)) then
			if((select uPass from users where uN = uName limit 1) = uneUP) then
				set loggedin = true;
                
		end if;
        end if;
        return(loggedin);
	end//
*/

/*
delimiter //
drop function qAddUser//
#returns 0 for created, returns 1 if username is already taken, returns 2 if password isn't long enough.
create function qAddUser(uN varchar(16), uP varchar(32)) returns int
	deterministic
    begin
		declare unencodedUP varchar(32);
        set unencodedUP = decode(uP, 'fub');
		
		if(select exists(select uName from users where uN = uName limit 1)) then #If username is already taken
			return (1);
		end if;
        
        if(length(unencodedUP) < 8) then #If password isn't long enough
			return (2);
         end if;
         
		insert into users(uName, uPass) values (uN, unencodedUP);
        return (0);
	
     end//   
*/

/*
delimiter //
drop procedure addUser//
create procedure addUser(uN varchar(16), uP varchar(32))
	begin
		insert into users(uName, uPass) values (uN, decode(uP, 'fub'));
	end//
*/

#call addUser("JoeSmith", "Pass");
#select * from users;
#select qLogin("JoeSmith", "Pass");
				
	
