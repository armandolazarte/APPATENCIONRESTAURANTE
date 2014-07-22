delimiter $$
create trigger trggBeforeInsertTUsuario before insert on TUsuario FOR EACH ROW
begin
set @anio=(select YEAR(NOW()));
set @mes=(select MONTH(NOW()));
if length(@mes)=1 then
	set @mes=concat('0', @mes);
end if;
set @ultimoCodigo=(select max(codigoUsuario) from TUsuario);
if @ultimoCodigo is null then
	set @ultimoCodigo=(select concat(@anio, @mes, "XX", "0000000"));
end if;
set @parteAnio=mid(@ultimoCodigo, 1, 4);
set @parteNumerica=mid(@ultimoCodigo, 9, 7);
if @parteAnio=@anio then
	set @parteNumerica=@parteNumerica+1;
else
	set @parteNumerica=1;
end if;
set @longitudNumero=(select length(@parteNumerica));
set @codigoNumerico=concat(repeat('0', 7-@longitudNumero), @parteNumerica);
set @codigo=concat(@anio, @mes, 'XX', @codigoNumerico);
set NEW.codigoUsuario=(select @codigo);
end
$$

delimiter $$
create trigger trggBeforeInsertTCategoria before insert on TCategoria FOR EACH ROW
begin
set @anio=(select YEAR(NOW()));
set @mes=(select MONTH(NOW()));
if length(@mes)=1 then
	set @mes=concat('0', @mes);
end if;
set @ultimoCodigo=(select max(codigoCategoria) from TCategoria);
if @ultimoCodigo is null then
	set @ultimoCodigo=(select concat(@anio, @mes, "XX", "0000000"));
end if;
set @parteAnio=mid(@ultimoCodigo, 1, 4);
set @parteNumerica=mid(@ultimoCodigo, 9, 7);
if @parteAnio=@anio then
	set @parteNumerica=@parteNumerica+1;
else
	set @parteNumerica=1;
end if;
set @longitudNumero=(select length(@parteNumerica));
set @codigoNumerico=concat(repeat('0', 7-@longitudNumero), @parteNumerica);
set @codigo=concat(@anio, @mes, 'XX', @codigoNumerico);
set NEW.codigoCategoria=(select @codigo);
end
$$

delimiter $$
create trigger trggBeforeInsertTProducto before insert on TProducto FOR EACH ROW
begin
set @anio=(select YEAR(NOW()));
set @mes=(select MONTH(NOW()));
if length(@mes)=1 then
	set @mes=concat('0', @mes);
end if;
set @ultimoCodigo=(select max(codigoProducto) from TProducto);
if @ultimoCodigo is null then
	set @ultimoCodigo=(select concat(@anio, @mes, "XX", "0000000"));
end if;
set @parteAnio=mid(@ultimoCodigo, 1, 4);
set @parteNumerica=mid(@ultimoCodigo, 9, 7);
if @parteAnio=@anio then
	set @parteNumerica=@parteNumerica+1;
else
	set @parteNumerica=1;
end if;
set @longitudNumero=(select length(@parteNumerica));
set @codigoNumerico=concat(repeat('0', 7-@longitudNumero), @parteNumerica);
set @codigo=concat(@anio, @mes, 'XX', @codigoNumerico);
set NEW.codigoProducto=(select @codigo);
end
$$

delimiter $$
create trigger trggBeforeInsertTProductoTCategoria before insert on TProductoTCategoria FOR EACH ROW
begin
set @anio=(select YEAR(NOW()));
set @mes=(select MONTH(NOW()));
if length(@mes)=1 then
	set @mes=concat('0', @mes);
end if;
set @ultimoCodigo=(select max(codigoProductoTCategoria) from TProductoTCategoria);
if @ultimoCodigo is null then
	set @ultimoCodigo=(select concat(@anio, @mes, "XX", "0000000"));
end if;
set @parteAnio=mid(@ultimoCodigo, 1, 4);
set @parteNumerica=mid(@ultimoCodigo, 9, 7);
if @parteAnio=@anio then
	set @parteNumerica=@parteNumerica+1;
else
	set @parteNumerica=1;
end if;
set @longitudNumero=(select length(@parteNumerica));
set @codigoNumerico=concat(repeat('0', 7-@longitudNumero), @parteNumerica);
set @codigo=concat(@anio, @mes, 'XX', @codigoNumerico);
set NEW.codigoProductoTCategoria=(select @codigo);
end
$$