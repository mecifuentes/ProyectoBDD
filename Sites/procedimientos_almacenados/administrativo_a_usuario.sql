CREATE OR REPLACE FUNCTION

mover_administrativos_dblink()

RETURNS void AS $$


DECLARE
tupla_adm RECORD ;

BEGIN
    FOR tupla_adm IN (SELECT * FROM
    public.dblink('dbname=grupo24e3
    port=5432
    password=familiaperez24
    user=grupo24', "select personal.did, personal.rut, personal.nombre_p, personal.sexo, personal.edad from personal where personal.tipo = 'administrativo'")
    as f(id int, rut varchar, nombre varchar, sexo varchar, edad int))

    LOOP
        INSERT INTO 
    END LOOP


END