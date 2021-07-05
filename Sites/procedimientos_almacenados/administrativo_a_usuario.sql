CREATE OR REPLACE FUNCTION

mover_administrativos_dblink()

RETURNS void AS $$


DECLARE @counter int,
        @counter2 int,
        tupla_adm RECORD ;

SET @counter = 1
SET @counter2 = 1

BEGIN
    FOR tupla_adm IN (SELECT * FROM
    public.dblink('dbname=grupo24e3
    port=5432
    password=familiaperez24
    user=grupo24', 'select distinct personal.id, personal.rut, personal.nombre, personal.sexo, personal.edad, unidades.direccion, direcciones.comuna from personal, unidades, direcciones where personal.clasificacion = ''administracion'' and unidades.id = personal.unidad and direcciones.id = unidades.direccion')
    as f(id int, rut varchar, nombre varchar, sexo varchar, edad int, direccion varchar, comuna varchar))

    LOOP
        IF NOT EXISTS (select usuario.rut from usuario where usuario.rut = tupla_adm.rut)
        BEGIN
            INSERT INTO Usuario VALUES(364 + @counter2, tupla_adm.nombre, tupla_adm.rut, tupla_adm.edad, tupla_adm.sexo);
            IF NOT EXISTS (select direccion.nombre from direccion where direccion.nombre = tupla_adm.direccion)
            BEGIN
                INSERT INTO Direccion VALUES(1097 + @counter, direccion, comuna);
                SET @counter = @counter + 1
            END
        END 


    END LOOP;


END
$$ language plpgsql