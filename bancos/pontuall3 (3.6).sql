--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: pointcards; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pointcards (
    id integer NOT NULL,
    id_expert integer NOT NULL,
    id_process integer NOT NULL,
    date_day character varying,
    morning_entry time without time zone,
    morning_departure time without time zone,
    late_entry time without time zone,
    afternoon_departure time without time zone,
    night_entry time without time zone,
    night_departure time without time zone,
    daily_rest_worked time without time zone,
    nocturnal_rest_worked time without time zone,
    situation character varying,
    extra_hour_daily1 time without time zone,
    extra_hour_daily2 time without time zone,
    extra_hour_daily3 time without time zone,
    night_overtime1 time without time zone,
    night_overtime2 time without time zone,
    night_overtime3 time without time zone,
    total_daily_time time without time zone
);


ALTER TABLE public.pointcards OWNER TO postgres;

--
-- Name: pointcards_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pointcards_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pointcards_id_seq OWNER TO postgres;

--
-- Name: pointcards_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pointcards_id_seq OWNED BY pointcards.id;


--
-- Name: processes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE processes (
    id integer NOT NULL,
    id_expert integer NOT NULL,
    num_process character varying NOT NULL,
    labour_stick character varying NOT NULL,
    name_claimed character varying NOT NULL,
    claimants_name character varying NOT NULL,
    worked_hours time without time zone NOT NULL,
    date_distribution date NOT NULL,
    prescription_date date,
    admission_date date NOT NULL,
    resignation_date date,
    type_process character varying NOT NULL,
    weekly_break character varying NOT NULL,
    monthly_breakdown integer NOT NULL,
    day_hour integer
);


ALTER TABLE public.processes OWNER TO postgres;

--
-- Name: processes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE processes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.processes_id_seq OWNER TO postgres;

--
-- Name: processes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE processes_id_seq OWNED BY processes.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name_exp character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    cpf character varying(14) NOT NULL,
    email character varying(150) NOT NULL,
    password character varying(200) NOT NULL,
    username character varying(50) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pointcards ALTER COLUMN id SET DEFAULT nextval('pointcards_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY processes ALTER COLUMN id SET DEFAULT nextval('processes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: pointcards; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO pointcards VALUES (101, 1, 5, '02/12/2004 Thursday', '08:00:00', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (102, 1, 5, '03/12/2004 Friday', '08:00:00', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (103, 1, 5, '04/12/2004 Saturday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (104, 1, 5, '05/12/2004 Sunday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (105, 1, 5, '06/12/2004 Monday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (106, 1, 5, '07/12/2004 Tuesday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (107, 1, 5, '08/12/2004 Wednesday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (108, 1, 5, '09/12/2004 Thursday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (109, 1, 5, '10/12/2004 Friday', '08:00:00', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (110, 1, 5, '11/12/2004 Saturday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (111, 1, 5, '12/12/2004 Sunday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (112, 1, 5, '13/12/2004 Monday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (113, 1, 5, '14/12/2004 Tuesday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (114, 1, 5, '15/12/2004 Wednesday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (115, 1, 5, '16/12/2004 Thursday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (116, 1, 5, '17/12/2004 Friday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (117, 1, 5, '18/12/2004 Saturday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (118, 1, 5, '19/12/2004 Sunday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (119, 1, 5, '20/12/2004 Monday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (120, 1, 5, '21/12/2004 Tuesday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (121, 1, 2, '29/05/2016 Sunday', '08:00:00', '12:00:00', '14:00:00', '18:00:00', NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (122, 1, 2, '30/05/2016 Monday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO pointcards VALUES (123, 1, 2, '31/05/2016 Tuesday', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'atividade', NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- Name: pointcards_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pointcards_id_seq', 123, true);


--
-- Data for Name: processes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO processes VALUES (1, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '4ª vara do trabalho de rio grande', 'Julian cunha da silva', 'Wandlei Silva', '08:00:00', '2016-06-01', '2016-06-01', '2016-05-29', '2016-05-31', 'comum', 'domingo', 26, NULL);
INSERT INTO processes VALUES (2, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '4ª vara do trabalho de rio grande', 'Rafael cunha da silva', 'Ricky Gaucho', '08:00:00', '2016-06-01', NULL, '2016-05-29', NULL, 'normal', 'domingo', 26, NULL);
INSERT INTO processes VALUES (3, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '4ª vara do trabalho de rio grande', 'Tabajara futebol clube', 'andré fibonatch', '08:00:00', '2023-07-15', NULL, '2013-02-14', NULL, 'normal', 'domingo', 26, 8);
INSERT INTO processes VALUES (4, 1, '0068900-12.095040122', '2ª Rio Grande', 'Anselmo Faustini & Cia. Ltda.', 'Valéria Ferreira de Oliveira', '08:00:00', '2012-10-05', NULL, '2004-12-02', '2007-10-05', 'normal', 'segunda', 1, 8);
INSERT INTO processes VALUES (5, 1, '0068900-12.095040122', '2ª Rio Grande', 'Luan', 'marla', '08:00:00', '2006-12-05', NULL, '2004-12-02', '2004-12-22', 'normal', 'domingo', 30, 8);


--
-- Name: processes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('processes_id_seq', 5, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users VALUES (2, 'Sandra', 'Vitola', '00000000000', 'svitola@terra.com.br', '803474753a226643ed8997bf836f7873d7a16996', 'sian');
INSERT INTO users VALUES (1, 'Luan', 'Vitola', '02351001028', 'luanvs@hotmail.com', 'd0302fc5147d39ec8db3eb006b8aea9dc86ba124', 'luan');


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 2, true);


--
-- Name: pointcards_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pointcards
    ADD CONSTRAINT pointcards_pkey PRIMARY KEY (id);


--
-- Name: processes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY processes
    ADD CONSTRAINT processes_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: fk_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY processes
    ADD CONSTRAINT fk_users FOREIGN KEY (id_expert) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

