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
    id_processes integer NOT NULL,
    date_day date NOT NULL,
    morning_entry time without timezone,
    late_entry time without timezone,
    night_entry time without timezone,
    daily_rest_worked time without timezone,
    morning_departure time without timezone,
    afternoon_departure time without timezone,
    night_departure time without timezone,
    nocturnal_rest_worked time without timezone,
    extra_hour_daily1 time without timezone,
    extra_hour_daily2 time without timezone,
    extra_hour_daily3 time without timezone,
    night_overtime1 time without timezone,
    night_overtime2 time without timezone,
    night_overtime3 time without timezone,
    total_daily_time time without timezone,
    situation character varying
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
    id character varying NOT NULL,
    id_expert integer NOT NULL,
    labour_stick character varying NOT NULL,
    name_claimed character varying NOT NULL,
    claimants_name character varying NOT NULL,
    worked_hours integer NOT NULL,
    initial_date date NOT NULL,
    end_date date NOT NULL,
    admission_date date NOT NULL,
    type_process character varying NOT NULL,
    weekly_break character varying NOT NULL,
    monthly_breakdown character varying NOT NULL,
    calculation_period integer NOT NULL
);


ALTER TABLE public.processes OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name_exp character varying NOT NULL,
    last_name character varying NOT NULL,
    cpf varchar (15) NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL,
    username character varying(50) NOT NULL,
    imagem character varying
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

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: pointcards; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pointcards (id, id_expert, id_process, date_day, morning_entry, late_entry, night_entry, daily_rest_worked, morning_departure, afternoon_departure, night_departure, nocturnal_rest_worked, extra_hour_daily1, extra_hour_daily2, extra_hour_daily3, night_overtime1, night_overtime2, night_overtime3, total_daily_time, situation) FROM stdin;
\.


--
-- Name: pointcards_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pointcards_id_seq', 1, false);


--
-- Data for Name: processes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY processes (id, id_expert, labour_stick, name_claimed, claimants_name, worked_hours, initial_date, end_date, admission_date, type_process, weekly_break, monthly_breakdown, calculation_period) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, name_exp, last_name, cpf, email, password, username, imagem) FROM stdin;
7	luan	vitola	0	luanvs@hotmail.com	$2y$10$UHSpWZp..2ROp44tIa31ye7SecgfLlfg0InyUiRyutq2ezGFm0mDe	luan	11168878_857438857668318_7252814596546371013_n.jpg
8	marla	sopena	0	e@mail.com	$2y$10$G7Xm3WOqmVEkP3GblD.erOZJmydqwTOE5veKo2aUzLvwNbzLUJC8i	marla	11141330_1575841315999644_7005276403336617421_n.jpg
9	dio	0	0	i@i.com	$2y$10$ZidPQp94aRO2xxWT4F9R7etf0DGkWHJyVi8GIUzpAST5.HEsuk80u	dio	10407568_875770812505281_2111805808108041584_n.jpg
10	j	j	0	j@j.com	$2y$10$NAxKtYnyvrxwSZW8bLym2OF46wP2YAD.NBd3hixcRzytydYXbeatS	teste	10527293_645021102297679_4655238693819367464_n.jpg
11	asd	asdad	2147483647	a@a.com	$2y$10$IJAMYawWPf.MDv1vZq8OM.yX1qsK1m7T3ddAxc87c8mDNZC2QuWmy	postgres	10527293_645021102297679_4655238693819367464_n.jpg
12	asdahsjdk	ashdjkashdjk	2147483647	u@W.com	$2y$10$02uNBTtjr6Or0q28iTilvOxNtTJRIcqeDEvqA6BroIG8AxOu.hyFu	ASDASD	11011781_483656281789116_6853594042337336622_n.jpg
13	sdfghsjdfgshj	asdhajksdhj	11	g@f.com	$2y$10$/0tR3LrrFvX2ieXGKJuUn.2bQKbvXHJoKO15gI8qC136wC8iBngnC	asdasd	11168878_857438857668318_7252814596546371013_n.jpg
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 13, true);


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
-- Name: pointcards_id_expert_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pointcards
    ADD CONSTRAINT pointcards_id_expert_fkey FOREIGN KEY (id_expert) REFERENCES users(id);


--
-- Name: pointcards_id_process_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pointcards
    ADD CONSTRAINT pointcards_id_process_fkey FOREIGN KEY (id_process) REFERENCES processes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: processes_id_expert_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY processes
    ADD CONSTRAINT processes_id_expert_fkey FOREIGN KEY (id_expert) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE;


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

