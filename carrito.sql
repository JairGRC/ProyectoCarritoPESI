PGDMP         2            	    y            carrito    12.6    12.6 f    ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    16711    carrito    DATABASE     ?   CREATE DATABASE carrito WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';
    DROP DATABASE carrito;
                postgres    false            ?            1259    16823    cabeceraventas    TABLE     ?  CREATE TABLE public.cabeceraventas (
    codventa integer NOT NULL,
    codcliente integer NOT NULL,
    codtipo integer NOT NULL,
    fechaventa date NOT NULL,
    nrodoc character varying(9) NOT NULL,
    subtotal double precision NOT NULL,
    igv double precision NOT NULL,
    total double precision NOT NULL,
    estado integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 "   DROP TABLE public.cabeceraventas;
       public         heap    postgres    false            ?            1259    16821    cabeceraventas_codventa_seq    SEQUENCE     ?   CREATE SEQUENCE public.cabeceraventas_codventa_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.cabeceraventas_codventa_seq;
       public          postgres    false    222            ?           0    0    cabeceraventas_codventa_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.cabeceraventas_codventa_seq OWNED BY public.cabeceraventas.codventa;
          public          postgres    false    221            ?            1259    16765 
   categorias    TABLE     ?   CREATE TABLE public.categorias (
    codcategoria integer NOT NULL,
    descripcion character varying(30) NOT NULL,
    estado integer DEFAULT 1 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.categorias;
       public         heap    postgres    false            ?            1259    16763    categorias_codcategoria_seq    SEQUENCE     ?   CREATE SEQUENCE public.categorias_codcategoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.categorias_codcategoria_seq;
       public          postgres    false    212            ?           0    0    categorias_codcategoria_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.categorias_codcategoria_seq OWNED BY public.categorias.codcategoria;
          public          postgres    false    211            ?            1259    16756    clientes    TABLE     w  CREATE TABLE public.clientes (
    codcliente integer NOT NULL,
    nombres character varying(60) NOT NULL,
    direccion character varying(60) NOT NULL,
    ruc_dni character varying(10) NOT NULL,
    email character varying(30) NOT NULL,
    estado integer DEFAULT 1 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.clientes;
       public         heap    postgres    false            ?            1259    16754    clientes_codcliente_seq    SEQUENCE     ?   CREATE SEQUENCE public.clientes_codcliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.clientes_codcliente_seq;
       public          postgres    false    210            ?           0    0    clientes_codcliente_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.clientes_codcliente_seq OWNED BY public.clientes.codcliente;
          public          postgres    false    209            ?            1259    16834    detalleventas    TABLE       CREATE TABLE public.detalleventas (
    codventa integer NOT NULL,
    codigoproducto integer NOT NULL,
    precio double precision NOT NULL,
    cantidad double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public.detalleventas;
       public         heap    postgres    false            ?            1259    16744    failed_jobs    TABLE     ?   CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            ?            1259    16742    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    208            ?           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    207            ?            1259    16714 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            ?            1259    16712    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    203            ?           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    202            ?            1259    16857    pago    TABLE       CREATE TABLE public.pago (
    idpago integer NOT NULL,
    visa character varying(16),
    monto double precision,
    vuelto double precision,
    idtipopago integer,
    codventa integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.pago;
       public         heap    postgres    false            ?            1259    16855    pago_idpago_seq    SEQUENCE     ?   CREATE SEQUENCE public.pago_idpago_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.pago_idpago_seq;
       public          postgres    false    227            ?           0    0    pago_idpago_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.pago_idpago_seq OWNED BY public.pago.idpago;
          public          postgres    false    226            ?            1259    16791 
   parametros    TABLE       CREATE TABLE public.parametros (
    tipo_id integer NOT NULL,
    serie character varying(3) NOT NULL,
    numeracion character varying(6) NOT NULL,
    codtipo integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.parametros;
       public         heap    postgres    false            ?            1259    16789    parametros_tipo_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.parametros_tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.parametros_tipo_id_seq;
       public          postgres    false    218            ?           0    0    parametros_tipo_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.parametros_tipo_id_seq OWNED BY public.parametros.tipo_id;
          public          postgres    false    217            ?            1259    16735    password_resets    TABLE     ?   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            ?            1259    16804 	   productos    TABLE     ?  CREATE TABLE public.productos (
    codigoproducto integer NOT NULL,
    descripcion character varying(30) NOT NULL,
    codcategoria integer NOT NULL,
    codigounidad integer NOT NULL,
    stock integer NOT NULL,
    precio double precision NOT NULL,
    estado integer DEFAULT 1 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.productos;
       public         heap    postgres    false            ?            1259    16802    productos_codigoproducto_seq    SEQUENCE     ?   CREATE SEQUENCE public.productos_codigoproducto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.productos_codigoproducto_seq;
       public          postgres    false    220            ?           0    0    productos_codigoproducto_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.productos_codigoproducto_seq OWNED BY public.productos.codigoproducto;
          public          postgres    false    219            ?            1259    16783    tipo    TABLE     ?   CREATE TABLE public.tipo (
    codtipo integer NOT NULL,
    descripcion character varying(20) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.tipo;
       public         heap    postgres    false            ?            1259    16781    tipo_codtipo_seq    SEQUENCE     ?   CREATE SEQUENCE public.tipo_codtipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.tipo_codtipo_seq;
       public          postgres    false    216            ?           0    0    tipo_codtipo_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.tipo_codtipo_seq OWNED BY public.tipo.codtipo;
          public          postgres    false    215            ?            1259    16849    tipopago    TABLE     ?   CREATE TABLE public.tipopago (
    idtipopago integer NOT NULL,
    tipopago character varying(30) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.tipopago;
       public         heap    postgres    false            ?            1259    16847    tipopago_idtipopago_seq    SEQUENCE     ?   CREATE SEQUENCE public.tipopago_idtipopago_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tipopago_idtipopago_seq;
       public          postgres    false    225            ?           0    0    tipopago_idtipopago_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tipopago_idtipopago_seq OWNED BY public.tipopago.idtipopago;
          public          postgres    false    224            ?            1259    16774    unidades    TABLE     ?   CREATE TABLE public.unidades (
    codunidad integer NOT NULL,
    descripcion character varying(20) NOT NULL,
    estado integer DEFAULT 1 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.unidades;
       public         heap    postgres    false            ?            1259    16772    unidades_codunidad_seq    SEQUENCE     ?   CREATE SEQUENCE public.unidades_codunidad_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.unidades_codunidad_seq;
       public          postgres    false    214            ?           0    0    unidades_codunidad_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.unidades_codunidad_seq OWNED BY public.unidades.codunidad;
          public          postgres    false    213            ?            1259    16722    users    TABLE     T  CREATE TABLE public.users (
    id bigint NOT NULL,
    "Nombres" character varying(30) NOT NULL,
    "ApePaterno" character varying(20) NOT NULL,
    "ApeMaterno" character varying(20) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    estado integer DEFAULT 1 NOT NULL,
    rol character varying(255) DEFAULT 'Vendedor'::character varying NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            ?            1259    16720    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    205            ?           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    204            ?
           2604    16826    cabeceraventas codventa    DEFAULT     ?   ALTER TABLE ONLY public.cabeceraventas ALTER COLUMN codventa SET DEFAULT nextval('public.cabeceraventas_codventa_seq'::regclass);
 F   ALTER TABLE public.cabeceraventas ALTER COLUMN codventa DROP DEFAULT;
       public          postgres    false    222    221    222            ?
           2604    16768    categorias codcategoria    DEFAULT     ?   ALTER TABLE ONLY public.categorias ALTER COLUMN codcategoria SET DEFAULT nextval('public.categorias_codcategoria_seq'::regclass);
 F   ALTER TABLE public.categorias ALTER COLUMN codcategoria DROP DEFAULT;
       public          postgres    false    212    211    212            ?
           2604    16759    clientes codcliente    DEFAULT     z   ALTER TABLE ONLY public.clientes ALTER COLUMN codcliente SET DEFAULT nextval('public.clientes_codcliente_seq'::regclass);
 B   ALTER TABLE public.clientes ALTER COLUMN codcliente DROP DEFAULT;
       public          postgres    false    210    209    210            ?
           2604    16747    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    208    208            ?
           2604    16717    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202    203            ?
           2604    16860    pago idpago    DEFAULT     j   ALTER TABLE ONLY public.pago ALTER COLUMN idpago SET DEFAULT nextval('public.pago_idpago_seq'::regclass);
 :   ALTER TABLE public.pago ALTER COLUMN idpago DROP DEFAULT;
       public          postgres    false    226    227    227            ?
           2604    16794    parametros tipo_id    DEFAULT     x   ALTER TABLE ONLY public.parametros ALTER COLUMN tipo_id SET DEFAULT nextval('public.parametros_tipo_id_seq'::regclass);
 A   ALTER TABLE public.parametros ALTER COLUMN tipo_id DROP DEFAULT;
       public          postgres    false    217    218    218            ?
           2604    16807    productos codigoproducto    DEFAULT     ?   ALTER TABLE ONLY public.productos ALTER COLUMN codigoproducto SET DEFAULT nextval('public.productos_codigoproducto_seq'::regclass);
 G   ALTER TABLE public.productos ALTER COLUMN codigoproducto DROP DEFAULT;
       public          postgres    false    219    220    220            ?
           2604    16786    tipo codtipo    DEFAULT     l   ALTER TABLE ONLY public.tipo ALTER COLUMN codtipo SET DEFAULT nextval('public.tipo_codtipo_seq'::regclass);
 ;   ALTER TABLE public.tipo ALTER COLUMN codtipo DROP DEFAULT;
       public          postgres    false    215    216    216            ?
           2604    16852    tipopago idtipopago    DEFAULT     z   ALTER TABLE ONLY public.tipopago ALTER COLUMN idtipopago SET DEFAULT nextval('public.tipopago_idtipopago_seq'::regclass);
 B   ALTER TABLE public.tipopago ALTER COLUMN idtipopago DROP DEFAULT;
       public          postgres    false    225    224    225            ?
           2604    16777    unidades codunidad    DEFAULT     x   ALTER TABLE ONLY public.unidades ALTER COLUMN codunidad SET DEFAULT nextval('public.unidades_codunidad_seq'::regclass);
 A   ALTER TABLE public.unidades ALTER COLUMN codunidad DROP DEFAULT;
       public          postgres    false    213    214    214            ?
           2604    16725    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204    205            ?          0    16823    cabeceraventas 
   TABLE DATA           ?   COPY public.cabeceraventas (codventa, codcliente, codtipo, fechaventa, nrodoc, subtotal, igv, total, estado, created_at, updated_at) FROM stdin;
    public          postgres    false    222   }       ?          0    16765 
   categorias 
   TABLE DATA           _   COPY public.categorias (codcategoria, descripcion, estado, created_at, updated_at) FROM stdin;
    public          postgres    false    212   c}       ?          0    16756    clientes 
   TABLE DATA           r   COPY public.clientes (codcliente, nombres, direccion, ruc_dni, email, estado, created_at, updated_at) FROM stdin;
    public          postgres    false    210   ?}       ?          0    16834    detalleventas 
   TABLE DATA           k   COPY public.detalleventas (codventa, codigoproducto, precio, cantidad, created_at, updated_at) FROM stdin;
    public          postgres    false    223   ?~       ?          0    16744    failed_jobs 
   TABLE DATA           [   COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    208          ?          0    16714 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    203   3       ?          0    16857    pago 
   TABLE DATA           i   COPY public.pago (idpago, visa, monto, vuelto, idtipopago, codventa, created_at, updated_at) FROM stdin;
    public          postgres    false    227    ?       ?          0    16791 
   parametros 
   TABLE DATA           a   COPY public.parametros (tipo_id, serie, numeracion, codtipo, created_at, updated_at) FROM stdin;
    public          postgres    false    218   Y?       ?          0    16735    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    206   ??       ?          0    16804 	   productos 
   TABLE DATA           ?   COPY public.productos (codigoproducto, descripcion, codcategoria, codigounidad, stock, precio, estado, created_at, updated_at) FROM stdin;
    public          postgres    false    220   ??       ?          0    16783    tipo 
   TABLE DATA           L   COPY public.tipo (codtipo, descripcion, created_at, updated_at) FROM stdin;
    public          postgres    false    216    ?       ?          0    16849    tipopago 
   TABLE DATA           P   COPY public.tipopago (idtipopago, tipopago, created_at, updated_at) FROM stdin;
    public          postgres    false    225   T?       ?          0    16774    unidades 
   TABLE DATA           Z   COPY public.unidades (codunidad, descripcion, estado, created_at, updated_at) FROM stdin;
    public          postgres    false    214   ??       ?          0    16722    users 
   TABLE DATA           ?   COPY public.users (id, "Nombres", "ApePaterno", "ApeMaterno", email, email_verified_at, password, estado, rol, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    205   ??       ?           0    0    cabeceraventas_codventa_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.cabeceraventas_codventa_seq', 2, true);
          public          postgres    false    221            ?           0    0    categorias_codcategoria_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.categorias_codcategoria_seq', 7, true);
          public          postgres    false    211            ?           0    0    clientes_codcliente_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.clientes_codcliente_seq', 4, true);
          public          postgres    false    209            ?           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    207            ?           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 13, true);
          public          postgres    false    202            ?           0    0    pago_idpago_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.pago_idpago_seq', 2, true);
          public          postgres    false    226            ?           0    0    parametros_tipo_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.parametros_tipo_id_seq', 2, true);
          public          postgres    false    217            ?           0    0    productos_codigoproducto_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.productos_codigoproducto_seq', 6, true);
          public          postgres    false    219            ?           0    0    tipo_codtipo_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.tipo_codtipo_seq', 2, true);
          public          postgres    false    215            ?           0    0    tipopago_idtipopago_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.tipopago_idtipopago_seq', 2, true);
          public          postgres    false    224            ?           0    0    unidades_codunidad_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.unidades_codunidad_seq', 7, true);
          public          postgres    false    213            ?           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 7, true);
          public          postgres    false    204            ?
           2606    16828 "   cabeceraventas cabeceraventas_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.cabeceraventas
    ADD CONSTRAINT cabeceraventas_pkey PRIMARY KEY (codventa);
 L   ALTER TABLE ONLY public.cabeceraventas DROP CONSTRAINT cabeceraventas_pkey;
       public            postgres    false    222            ?
           2606    16771    categorias categorias_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (codcategoria);
 D   ALTER TABLE ONLY public.categorias DROP CONSTRAINT categorias_pkey;
       public            postgres    false    212            ?
           2606    16762    clientes clientes_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (codcliente);
 @   ALTER TABLE ONLY public.clientes DROP CONSTRAINT clientes_pkey;
       public            postgres    false    210            ?
           2606    16753    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    208            ?
           2606    16719    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    203            ?
           2606    16862    pago pago_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.pago
    ADD CONSTRAINT pago_pkey PRIMARY KEY (idpago);
 8   ALTER TABLE ONLY public.pago DROP CONSTRAINT pago_pkey;
       public            postgres    false    227            ?
           2606    16796    parametros parametros_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.parametros
    ADD CONSTRAINT parametros_pkey PRIMARY KEY (tipo_id);
 D   ALTER TABLE ONLY public.parametros DROP CONSTRAINT parametros_pkey;
       public            postgres    false    218            ?
           2606    16810    productos productos_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (codigoproducto);
 B   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_pkey;
       public            postgres    false    220            ?
           2606    16788    tipo tipo_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (codtipo);
 8   ALTER TABLE ONLY public.tipo DROP CONSTRAINT tipo_pkey;
       public            postgres    false    216            ?
           2606    16854    tipopago tipopago_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.tipopago
    ADD CONSTRAINT tipopago_pkey PRIMARY KEY (idtipopago);
 @   ALTER TABLE ONLY public.tipopago DROP CONSTRAINT tipopago_pkey;
       public            postgres    false    225            ?
           2606    16780    unidades unidades_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.unidades
    ADD CONSTRAINT unidades_pkey PRIMARY KEY (codunidad);
 @   ALTER TABLE ONLY public.unidades DROP CONSTRAINT unidades_pkey;
       public            postgres    false    214            ?
           2606    16734    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    205            ?
           2606    16732    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    205            ?
           1259    16741    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    206            ?
           2606    16829 0   cabeceraventas cabeceraventas_codcliente_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.cabeceraventas
    ADD CONSTRAINT cabeceraventas_codcliente_foreign FOREIGN KEY (codcliente) REFERENCES public.clientes(codcliente);
 Z   ALTER TABLE ONLY public.cabeceraventas DROP CONSTRAINT cabeceraventas_codcliente_foreign;
       public          postgres    false    222    210    2793            ?
           2606    16842 2   detalleventas detalleventas_codigoproducto_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.detalleventas
    ADD CONSTRAINT detalleventas_codigoproducto_foreign FOREIGN KEY (codigoproducto) REFERENCES public.productos(codigoproducto);
 \   ALTER TABLE ONLY public.detalleventas DROP CONSTRAINT detalleventas_codigoproducto_foreign;
       public          postgres    false    223    2803    220            ?
           2606    16837 ,   detalleventas detalleventas_codventa_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.detalleventas
    ADD CONSTRAINT detalleventas_codventa_foreign FOREIGN KEY (codventa) REFERENCES public.cabeceraventas(codventa);
 V   ALTER TABLE ONLY public.detalleventas DROP CONSTRAINT detalleventas_codventa_foreign;
       public          postgres    false    2805    222    223                       2606    16868    pago pago_codventa_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.pago
    ADD CONSTRAINT pago_codventa_foreign FOREIGN KEY (codventa) REFERENCES public.cabeceraventas(codventa);
 D   ALTER TABLE ONLY public.pago DROP CONSTRAINT pago_codventa_foreign;
       public          postgres    false    227    222    2805                        2606    16863    pago pago_idtipopago_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.pago
    ADD CONSTRAINT pago_idtipopago_foreign FOREIGN KEY (idtipopago) REFERENCES public.tipopago(idtipopago);
 F   ALTER TABLE ONLY public.pago DROP CONSTRAINT pago_idtipopago_foreign;
       public          postgres    false    227    225    2807            ?
           2606    16797 %   parametros parametros_codtipo_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.parametros
    ADD CONSTRAINT parametros_codtipo_foreign FOREIGN KEY (codtipo) REFERENCES public.tipo(codtipo);
 O   ALTER TABLE ONLY public.parametros DROP CONSTRAINT parametros_codtipo_foreign;
       public          postgres    false    2799    216    218            ?
           2606    16811 (   productos productos_codcategoria_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_codcategoria_foreign FOREIGN KEY (codcategoria) REFERENCES public.categorias(codcategoria);
 R   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_codcategoria_foreign;
       public          postgres    false    2795    220    212            ?
           2606    16816 (   productos productos_codigounidad_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_codigounidad_foreign FOREIGN KEY (codigounidad) REFERENCES public.unidades(codunidad);
 R   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_codigounidad_foreign;
       public          postgres    false    220    2797    214            ?   A   x?mʱ? ?ڿ???,?	??PQ!]y?Dq??2 Y,?A?g??-??6:?!??w?????p      ?   X   x?3?tJM?LI,?4???".#NǤĢ???T??1?????%??!N???$}??ΉEyH??8]s?JK2S?t?s?%&g#b???? z?"?      ?     x?u?=j?@?zt?????eu? L???n6??Y??+m?ۤL?#?bY;!ML5??xL-???!k?w??
{-?Q????¸???,l???]?A?Y??%tl-q??Z??;1Dp~??pt?`m6??E????v????ˍ?Q?8?"L=????c?;??@?[??????V?IuiMؒ???Iy?q?`??H??S??j?e?J???_3?è??(?r?֑Y????/?????yT?'?a%???|=??\????,? ???o      ?   #   x?3?4?4?4???".CN#NS8?F?b???? ?U?      ?      x?????? ? ?      ?   ?   x?e??n? ???c&lhB?e???bb%"t??????O?]?E????I8=WI+e??\???	.???19J?J.????,??)rc??W?
7G ????#?1;???G?b?g???n?????Fku=J>?cWm;?a??/?p?q??r??ߒS,[?7=:E??s?A????M2K???UC?6b?=?$s?&?I???E????[?}i[?Ϗ??? 
$??      ?   )   x?3????42???4B ;Ə?Dp?E??b1z\\\ ???      ?   )   x?3?400bCNC?? ?2
??!?2?
??qqq ? ?      ?      x?????? ? ?      ?   a   x?3????NTp??I?4BSNS ?D\Ɯ?řXdL8????? ?L,-9??RF@?d$#A?????EE?U?F@?*c???h?\:F??? ?\$h      ?   $   x?3?tst	r???".#N'?7F??? ?D?      ?   '   x?3?tMKM.?,????".#ΐĢ?ԒD(?F??? ?	?      ?   ]   x?3?t?/I??I?4???".#?HNq??Fv?&\И?'??Ƅ?)1/%5!b???W?X?
0?t?-H,,MU?0?7B6˜3 $^?P???? d?!?      ?   ?  x?͔?n?0???S??kX??J?Iۤ$?vi?????bLD???g?[R)jW??d??<?4?? Xc&? ??5m???Ki,/? ob?Y???-??i??=??xr???=I??9??4?7?V??Z?r6?e?s???X????? ?9?D?s)]??H?G?x??aں??|v?????	X??,?p	R?????Y%k??Z-?M?'?"y???1??3ۯ?j?8?}ۼ???Ǉ?????w????I???u??,ge%q???6?s=3ŀu?s??+F??:?ʄ?e????G???|?!?ү???1??a\???w!j????-??B???N??h?Y?.????ؕBv????)??u
k??|???f???߉7??e?T?m2O?b?eS????"p7??+???3?Ս?2V? ?F?t?,??m??cʛ?(?_½\`     