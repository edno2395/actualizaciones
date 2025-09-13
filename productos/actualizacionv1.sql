-- Agregar una columna a una tabla existente
ALTER TABLE productos_nuevos ADD COLUMN precio REAL;

-- Insertar algunos registros nuevos
INSERT INTO productos_nuevos (nombre, descripcion) VALUES ('Producto A', 'Descripción del Producto A');
INSERT INTO productos_nuevos (nombre, descripcion) VALUES ('Producto B', 'Descripción del Producto B');


