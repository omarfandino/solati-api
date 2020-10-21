# solati-api
---
## Rutas
| Metodo | URL | Descripcion |
|   --- |   --- |   --- |
| GET | http://solati.ideoweinc.com/ | Consultar todos los usuarios |
| GET | http://solati.ideoweinc.com/?us_id=<ID> | Consultar usuario especifico dependiendo su ID |
| POST | http://solati.ideoweinc.com/ | Cargar via POST los siguientes datos y en el mismo orden: `{ "us_nombre":"Omar", "us_edad":"28", "us_cargo":"Desarrollo"}` |
| PUT | http://solati.ideoweinc.com/?us_nombre=NOMBRE&us_edad=EDAD&us_cargo=CARGO&us_id=ID | Cargar via GET los anteriores datos |
| DELETE | http://solati.ideoweinc.com/?us_id=<ID> | Eliminar usuario especifico dependiendo su ID |
