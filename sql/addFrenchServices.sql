ALTER TABLE servicio
ADD COLUMN servicioFr TEXT
AFTER servicioEn;

UPDATE servicio
SET servicioFr = 'Droit du travail'
WHERE idServicio = 3;

UPDATE servicio
SET servicioFr = 'Corporatif et transactionnel'
WHERE idServicio = 4;

UPDATE servicio
SET servicioFr = 'Conformité réglementaire'
WHERE idServicio = 5;

UPDATE servicio
SET servicioFr = 'Données personnelles et technologies de l\'information'
WHERE idServicio = 6;

UPDATE servicio
SET servicioFr = 'Droit de l\'énergie'
WHERE idServicio = 7;

UPDATE servicio
SET servicioFr = 'Private equity'
WHERE idServicio = 8;

UPDATE servicio
SET servicioFr = 'Gestion de patrimoine'
WHERE idServicio = 9;

UPDATE servicio
SET servicioFr = 'Immobilier'
WHERE idServicio = 10;

UPDATE servicio
SET servicioFr = 'Contentieux et modes alternatifs de règlement des conflits'
WHERE idServicio = 11;

UPDATE servicio
SET servicioFr = 'Immigration'
WHERE idServicio = 12;
