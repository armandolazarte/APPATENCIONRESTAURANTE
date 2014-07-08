create database DBAPPATENCIONRESTAURANTE;
use DBAPPATENCIONRESTAURANTE;

create table TUsuario
(
codigoUsuario char(15) not null,
nombre varchar(30) not null,
apellido varchar(40) not null,
dni char(8) not null,
fechaNacimiento date not null,
correoElectronico varchar(700) not null,
contrasenia varchar(700) not null,
rol char(1) not null,/*A->Administrador, U->Usuario Normal, V->Usuario de ventas*/
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
primary key(codigoUsuario)
);

create table TCliente
(
codigoCliente char(15) not null,
nombre varchar(30) not null,
apellido varchar(40) not null,
dni char(8) not null,
fechaNacimiento date not null,
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
primary key (codigoCliente)
);

create table TCategoria
(
codigoCategoria char(15) not null,
nombre varchar(70) not null,
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
primary key (codigoCategoria)
);

create table TProducto
(
codigoProducto char(15) not null,
codigoCategoria char(15) not null,
nombre varchar(700) not null,
descripcion text not null,
precioVentaUnitario decimal(8, 2) not null,
cantidad int not null,
fechaVencimiento date not null,
estado bool not null,/*true->Habilitado, false->Deshabilitado*/
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
foreign key (codigoCategoria) references TCategoria(codigoCategoria)
on update cascade on delete cascade,
primary key (codigoProducto)
);

create table TProductoRetiro
(
codigoProductoRetiro char(15) not null,
codigoProducto char(15) not null,
nombreProducto varchar(700) not null,
descripcionProducto text not null,
precioVentaUnitarioProducto decimal(8, 2) not null,
fechaVencimiento date not null,
cantidad int not null,
montoPerdida decimal(8, 2) not null,
foreign key (codigoProducto) references TProducto(codigoProducto)
on update cascade on delete cascade,
primary key (codigoProductoRetiro)
);

create table TVenta
(
codigoVenta char(15) not null,
codigoUsuario char(15) not null,
codigoCliente char(15) not null,
nombreCliente varchar(30) not null,
apellidoCliente varchar(40) not null,
dniCliente char(8) not null,
fechaNacimientoCliente date not null,
total decimal(8, 2) not null,
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
foreign key (codigoUsuario) references TUsuario(codigoUsuario)
on update cascade on delete cascade,
foreign key (codigoCliente) references TCliente(codigoCliente)
on update cascade on delete cascade,
primary key (codigoVenta)
);

create table TVentaDetalle
(
codigoVentaDetalle char(15) not null,
codigoVenta char(15) not null,
codigoProducto char(15) not null,
nombreProducto varchar(700) not null,
descripcionProducto text not null,
precioVentaUnitarioProducto decimal(8, 2) not null,
fechaVencimientoProducto date not null,
cantidad int not null,
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
foreign key (codigoVenta) references TVenta(codigoVenta)
on update cascade on delete cascade,
foreign key (codigoProducto) references TProducto(codigoProducto)
on update cascade on delete cascade,
primary key (codigoVenta)
);

create table TCaja
(
codigoCaja char(15) not null,
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
primary key (codigoCaja)
);

create table TCajaDetalle
(
codigoCajaDetalle char(15) not null,
codigoCaja char(15) not null,
codigoUsuario char(15) not null,
saldoInical decimal(8, 2) not null,
saldoFinal decimal(8, 2) not null,
estado bool not null,/*true->Caja abierta, false->Caja cerrada*/
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
foreign key (codigoCaja) references TCaja(codigoCaja)
on update cascade on delete cascade,
foreign key (codigoUsuario) references TUsuario(codigoUsuario)
on update cascade on delete cascade,
primary key (codigoCajaDetalle)
);

create table TEgreso
(
codigoEgreso char(15) not null,
codigoUsuario char(15) not null,
monto decimal(8, 2) not null,
descripcion text not null,
fechaRegistro timestamp not null default current_timestamp,
fechaModificacion timestamp not null default current_timestamp on update current_timestamp,
foreign key (codigoUsuario) references TUsuario(codigoUsuario)
on update cascade on delete cascade,
primary key (codigoEgreso)
);