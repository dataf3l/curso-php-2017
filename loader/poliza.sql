
create table poliza(
		id int not null auto_increment,
		fecha_inicial datetime,
		fecha_final datetime,
		valor_asegurado double,
		cliente_id int,
		estado int,
		valor_prima double,
		primary key(id)
	);
