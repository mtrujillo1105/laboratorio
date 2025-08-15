ALTER TABLE cotizacion add column if not exists COTIC_flag_pedido BOOLEAN DEFAULT FALSE;
ALTER TABLE cotizacion add column if not exists COTIC_dcto_porcentaje numeric(10,4);
ALTER TABLE cotizacion add column if not exists COTIC_dcto_importe numeric(10,4);
ALTER TABLE cotizacion add column if not exists COTIC_dcto_subtotatal numeric(10,4);

ALTER TABLE cotizacion_detalle add column if not exists CODEC_dcto_porcentaje numeric(10,4);
ALTER TABLE cotizacion_detalle add column if not exists CODEC_dcto_importe numeric(10,4);
ALTER TABLE cotizacion_detalle add column if not exists CODEC_dcto_subtotal numeric(10,4);