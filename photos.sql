DROP SCHEMA IF EXISTS geoPhotos CASCADE;


CREATE SCHEMA geoPhotos;
SET search_path = geoPhotos;

CREATE TABLE photo (
    uid serial PRIMARY KEY,
    filePath varchar(100),
    lat float,
    long float,
    dateUploaded date
);