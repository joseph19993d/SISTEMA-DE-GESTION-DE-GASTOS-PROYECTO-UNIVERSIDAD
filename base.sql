-- MySQL / MariaDB
Create DataBase If Not Exists Base
Character Set UTF8
Default Collate UTF8_General_CI;

Use Base;

Create Table If Not Exists Roles (
    Id Int Not Null Primary Key Auto_Increment,
    Nombre VarChar(35) Not Null Unique
) Engine = InnoDB;

Insert Into Roles (Nombre) Values ('Administrador'), ('Estándar');
