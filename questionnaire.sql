Create database questionnaire
go
use questionnaire
GO
CREATE TABLE [dbo].[administrator](
	[administrator_id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NULL,
	[all_access_administrator] [int] NULL,
	[can_add_and_delete_questions_and_assign_names] [int] NULL,
	[can_delete_all_from_subject] [int] NULL,
	[can_remove_class] [int] NULL,
	[creator] [bigint] NULL,
	[timestamp] [bigint] NULL,
	[viewer] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[administrator_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[attached_users_to_classes]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[attached_users_to_classes](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[user_id] [bigint] NULL,
	[live] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[classes]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[classes](
	[class_id] [bigint] IDENTITY(1,1) NOT NULL,
	[description_of_class] [varchar](8000) NULL,
	[class_name] [varchar](800) NULL,
	[live] [int] NULL,
	[user_id] [bigint] NULL,
PRIMARY KEY CLUSTERED 
(
	[class_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[library]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[library](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NULL,
	[file_location] [varchar](800) NULL,
	[authors] [varchar](1000) NULL,
	[title] [varchar](2000) NULL,
	[description] [text] NULL,
	[class_id] [bigint] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[library_keywords]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[library_keywords](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[library_id] [bigint] NOT NULL,
	[keyword1] [varchar](200) NULL,
	[keyword2] [varchar](200) NULL,
	[keyword3] [varchar](200) NULL,
	[keyword4] [varchar](200) NULL,
	[keyword5] [varchar](200) NULL,
	[keyword6] [varchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_ids]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_ids](
	[question_id] [bigint] IDENTITY(1,1) NOT NULL,
	[table_id] [int] NULL,
	[description] [varchar](8000) NULL,
	[class_id] [bigint] NULL,
	[question_number] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[question_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information1]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information1](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information10]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information10](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information11]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information11](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information12]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information12](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information13]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information13](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information14]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information14](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information15]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information15](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information16]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information16](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information17]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information17](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information18]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information18](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information19]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information19](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information2]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information2](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information20]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information20](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information21]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information21](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information22]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information22](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information23]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information23](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information24]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information24](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information25]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information25](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information26]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information26](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information27]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information27](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information28]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information28](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information29]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information29](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information3]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information3](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information30]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information30](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information4]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information4](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information5]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information5](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information6]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information6](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information7]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information7](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information8]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information8](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[question_information9]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[question_information9](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[class_id] [bigint] NULL,
	[question_id] [bigint] NULL,
	[question] [text] NULL,
	[pa1] [varchar](8000) NULL,
	[pa2] [varchar](8000) NULL,
	[pa3] [varchar](8000) NULL,
	[pa4] [varchar](8000) NULL,
	[pa5] [varchar](8000) NULL,
	[pa6] [varchar](8000) NULL,
	[pa7] [varchar](8000) NULL,
	[pa8] [varchar](8000) NULL,
	[answ1] [varchar](8000) NULL,
	[answ2] [varchar](8000) NULL,
	[answ3] [varchar](8000) NULL,
	[answ4] [varchar](8000) NULL,
	[answ5] [varchar](8000) NULL,
	[answ6] [varchar](8000) NULL,
	[answ7] [varchar](8000) NULL,
	[answ8] [varchar](8000) NULL,
	[correct] [varchar](5) NULL,
	[hint1] [varchar](8000) NULL,
	[hint2] [varchar](8000) NULL,
	[hint3] [varchar](8000) NULL,
	[hint4] [varchar](8000) NULL,
	[hint5] [varchar](8000) NULL,
	[hint6] [varchar](8000) NULL,
	[hint7] [varchar](8000) NULL,
	[hint8] [varchar](8000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[site_settings]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[site_settings](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[profile_name] [varchar](200) NOT NULL,
	[soibip] [int] NOT NULL,
	[solipip] [int] NOT NULL,
	[soripip] [int] NOT NULL,
	[pombw] [int] NOT NULL,
	[polsw] [int] NOT NULL,
	[porsw] [int] NOT NULL,
	[hobbip] [int] NOT NULL,
	[dfhb] [tinyint] NOT NULL,
	[efhb] [tinyint] NOT NULL,
	[dls] [tinyint] NOT NULL,
	[els] [tinyint] NOT NULL,
	[ers] [tinyint] NOT NULL,
	[drs] [tinyint] NOT NULL,
	[ecb] [tinyint] NOT NULL,
	[dcb] [tinyint] NOT NULL,
	[embpb] [tinyint] NOT NULL,
	[dmbpb] [tinyint] NOT NULL,
	[emapb] [tinyint] NOT NULL,
	[dmapb] [tinyint] NOT NULL,
	[enableBackgroundPicture] [tinyint] NOT NULL,
	[disableBackgroundPicture] [tinyint] NOT NULL,
	[cotisp] [varchar](16) NOT NULL,
	[rSideColour] [varchar](16) NOT NULL,
	[mbc] [varchar](16) NOT NULL,
	[lBarc] [varchar](16) NOT NULL,
	[tc] [varchar](16) NOT NULL,
	[coib] [varchar](16) NOT NULL,
	[cotiib] [varchar](16) NOT NULL,
	[cospb] [varchar](16) NOT NULL,
	[bc] [varchar](16) NOT NULL,
	[cotiqp] [varchar](16) NOT NULL,
	[coqaab] [varchar](16) NOT NULL,
	[cotiqaab] [varchar](16) NOT NULL,
	[coqb] [varchar](16) NOT NULL,
	[qbc] [varchar](16) NOT NULL,
	[siteH] [varchar](800) NOT NULL,
	[mabp] [varchar](800) NOT NULL,
	[cbp] [varchar](800) NOT NULL,
	[mbp] [varchar](800) NOT NULL,
	[bposa] [varchar](800) NOT NULL,
	[bpota] [varchar](800) NOT NULL,
	[tWritting] [varchar](17) NULL,
	[writting] [varchar](17) NULL,
	[soqipip] [int] NULL,
	[disableMovingBars] [int] NULL,
	[enableMovingBars] [int] NULL,
	[mboc] [varchar](18) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[subject_files]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[subject_files](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[video] [int] NULL,
	[audio] [int] NULL,
	[image] [int] NULL,
	[alt_text] [varchar](8000) NULL,
	[file_name] [varchar](800) NULL,
	[class_id] [int] NULL,
	[subject] [int] NULL,
	[user_id] [bigint] NULL,
	[float_num] [float] NULL,
	[numeral] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[subject_results]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[subject_results](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NULL,
	[class] [int] NULL,
	[subject] [int] NULL,
	[string] [text] NULL,
	[max_time] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tables]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tables](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[table_id] [bigint] NULL,
	[subject_information] [varchar](8000) NULL,
	[number_of_questions] [int] NULL,
	[class_id] [bigint] NULL,
	[number_of_removal] [int] NULL,
	[link1] [varchar](2000) NULL,
	[link2] [varchar](2000) NULL,
	[link3] [varchar](2000) NULL,
	[link4] [varchar](2000) NULL,
	[link5] [varchar](2000) NULL,
	[link6] [varchar](2000) NULL,
	[link7] [varchar](2000) NULL,
	[link8] [varchar](2000) NULL,
	[link9] [varchar](2000) NULL,
	[link10] [varchar](2000) NULL,
	[link_description1] [varchar](4000) NULL,
	[link_description2] [varchar](4000) NULL,
	[link_description3] [varchar](4000) NULL,
	[link_description4] [varchar](4000) NULL,
	[link_description5] [varchar](4000) NULL,
	[link_description6] [varchar](4000) NULL,
	[link_description7] [varchar](4000) NULL,
	[link_description8] [varchar](4000) NULL,
	[link_description9] [varchar](4000) NULL,
	[link_description10] [varchar](4000) NULL,
	[live] [int] NULL,
	[introduction] [text] NULL,
	[version] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[terms]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[terms](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[terms] [text] NULL,
	[class_id] [bigint] NULL,
	[main_site] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[token]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[token](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[token] [varchar](2000) NULL,
	[email] [varchar](200) NULL,
	[expires] [bigint] NULL,
	[purpose] [varchar](1000) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[user_id] [bigint] IDENTITY(1,1) NOT NULL,
	[email] [varchar](200) NULL,
	[pass] [varchar](800) NULL,
	[first_name] [varchar](50) NULL,
	[middle_names] [varchar](102) NULL,
	[last_name] [varchar](50) NULL,
	[phone_number] [varchar](20) NULL,
	[time_stamp] [int] NULL,
	[accepted_terms] [tinyint] NULL,
	[admin] [int] NULL,
	[style] [int] NULL,
	[failed_attempts] [int] NULL,
	[time_stamp_created] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users_results]    Script Date: 19/11/2024 1:55:45 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users_results](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[string] [varchar](8000) NOT NULL,
	[score] [int] NOT NULL,
	[class] [int] NOT NULL,
	[subject] [int] NOT NULL,
	[realtime] [int] NULL,
	[timestamp] [float] NULL,
	[time_taken] [varchar](200) NULL,
	[finished] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Index [library_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [library_index] ON [dbo].[library]
(
	[class_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_ids_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_ids_index] ON [dbo].[question_ids]
(
	[class_id] ASC,
	[table_id] ASC,
	[question_id] ASC,
	[question_number] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information1_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information1_index] ON [dbo].[question_information1]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information10_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information10_index] ON [dbo].[question_information10]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information11_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information11_index] ON [dbo].[question_information11]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information12_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information12_index] ON [dbo].[question_information12]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information13_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information13_index] ON [dbo].[question_information13]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information14_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information14_index] ON [dbo].[question_information14]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information15_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information15_index] ON [dbo].[question_information15]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information16_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information16_index] ON [dbo].[question_information16]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information17_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information17_index] ON [dbo].[question_information17]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information18_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information18_index] ON [dbo].[question_information18]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information19_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information19_index] ON [dbo].[question_information19]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information2_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information2_index] ON [dbo].[question_information2]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information20_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information20_index] ON [dbo].[question_information20]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information21_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information21_index] ON [dbo].[question_information21]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information22_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information22_index] ON [dbo].[question_information22]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information23_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information23_index] ON [dbo].[question_information23]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information24_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information24_index] ON [dbo].[question_information24]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information25_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information25_index] ON [dbo].[question_information25]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information26_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information26_index] ON [dbo].[question_information26]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information27_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information27_index] ON [dbo].[question_information27]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information28_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information28_index] ON [dbo].[question_information28]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information29_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information29_index] ON [dbo].[question_information29]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information3_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information3_index] ON [dbo].[question_information3]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information30_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information30_index] ON [dbo].[question_information30]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information4_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information4_index] ON [dbo].[question_information4]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information5_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information5_index] ON [dbo].[question_information5]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information6_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information6_index] ON [dbo].[question_information6]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information7_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information7_index] ON [dbo].[question_information7]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information8_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information8_index] ON [dbo].[question_information8]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [question_information9_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [question_information9_index] ON [dbo].[question_information9]
(
	[class_id] ASC,
	[question_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [subject_files_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [subject_files_index] ON [dbo].[subject_files]
(
	[class_id] ASC,
	[subject] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [subject_results_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [subject_results_index] ON [dbo].[subject_results]
(
	[class] ASC,
	[subject] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [tables_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [tables_index] ON [dbo].[tables]
(
	[class_id] ASC,
	[table_id] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [users_index] ON [dbo].[users]
(
	[admin] ASC,
	[email] ASC,
	[last_name] ASC,
	[first_name] ASC,
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [users_results_index]    Script Date: 19/11/2024 1:55:45 AM ******/
CREATE NONCLUSTERED INDEX [users_results_index] ON [dbo].[users_results]
(
	[user_id] ASC,
	[class] ASC,
	[subject] ASC,
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[users] ADD  DEFAULT ((0)) FOR [admin]
GO
ALTER TABLE [dbo].[users_results] ADD  DEFAULT ((0)) FOR [finished]
GO
ALTER TABLE [dbo].[administrator]  WITH CHECK ADD  CONSTRAINT [FK_users_administrators] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([user_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[administrator] CHECK CONSTRAINT [FK_users_administrators]
GO
ALTER TABLE [dbo].[question_ids]  WITH CHECK ADD  CONSTRAINT [FK_classes_question_ids] FOREIGN KEY([class_id])
REFERENCES [dbo].[classes] ([class_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_ids] CHECK CONSTRAINT [FK_classes_question_ids]
GO
ALTER TABLE [dbo].[question_information1]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information1] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information1] CHECK CONSTRAINT [FK_question_ids_question_information1]
GO
ALTER TABLE [dbo].[question_information10]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information10] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information10] CHECK CONSTRAINT [FK_question_ids_question_information10]
GO
ALTER TABLE [dbo].[question_information11]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information11] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information11] CHECK CONSTRAINT [FK_question_ids_question_information11]
GO
ALTER TABLE [dbo].[question_information12]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information12] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information12] CHECK CONSTRAINT [FK_question_ids_question_information12]
GO
ALTER TABLE [dbo].[question_information13]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information13] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information13] CHECK CONSTRAINT [FK_question_ids_question_information13]
GO
ALTER TABLE [dbo].[question_information14]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information14] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information14] CHECK CONSTRAINT [FK_question_ids_question_information14]
GO
ALTER TABLE [dbo].[question_information15]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information15] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information15] CHECK CONSTRAINT [FK_question_ids_question_information15]
GO
ALTER TABLE [dbo].[question_information16]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information16] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information16] CHECK CONSTRAINT [FK_question_ids_question_information16]
GO
ALTER TABLE [dbo].[question_information17]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information17] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information17] CHECK CONSTRAINT [FK_question_ids_question_information17]
GO
ALTER TABLE [dbo].[question_information18]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information18] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information18] CHECK CONSTRAINT [FK_question_ids_question_information18]
GO
ALTER TABLE [dbo].[question_information19]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information19] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information19] CHECK CONSTRAINT [FK_question_ids_question_information19]
GO
ALTER TABLE [dbo].[question_information2]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information2] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information2] CHECK CONSTRAINT [FK_question_ids_question_information2]
GO
ALTER TABLE [dbo].[question_information20]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information20] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information20] CHECK CONSTRAINT [FK_question_ids_question_information20]
GO
ALTER TABLE [dbo].[question_information21]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information21] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information21] CHECK CONSTRAINT [FK_question_ids_question_information21]
GO
ALTER TABLE [dbo].[question_information22]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information22] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information22] CHECK CONSTRAINT [FK_question_ids_question_information22]
GO
ALTER TABLE [dbo].[question_information23]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information23] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information23] CHECK CONSTRAINT [FK_question_ids_question_information23]
GO
ALTER TABLE [dbo].[question_information24]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information24] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information24] CHECK CONSTRAINT [FK_question_ids_question_information24]
GO
ALTER TABLE [dbo].[question_information25]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information25] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information25] CHECK CONSTRAINT [FK_question_ids_question_information25]
GO
ALTER TABLE [dbo].[question_information26]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information26] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information26] CHECK CONSTRAINT [FK_question_ids_question_information26]
GO
ALTER TABLE [dbo].[question_information27]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information27] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information27] CHECK CONSTRAINT [FK_question_ids_question_information27]
GO
ALTER TABLE [dbo].[question_information28]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information28] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information28] CHECK CONSTRAINT [FK_question_ids_question_information28]
GO
ALTER TABLE [dbo].[question_information29]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information29] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information29] CHECK CONSTRAINT [FK_question_ids_question_information29]
GO
ALTER TABLE [dbo].[question_information3]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information3] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information3] CHECK CONSTRAINT [FK_question_ids_question_information3]
GO
ALTER TABLE [dbo].[question_information30]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information30] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information30] CHECK CONSTRAINT [FK_question_ids_question_information30]
GO
ALTER TABLE [dbo].[question_information4]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information4] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information4] CHECK CONSTRAINT [FK_question_ids_question_information4]
GO
ALTER TABLE [dbo].[question_information5]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information5] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information5] CHECK CONSTRAINT [FK_question_ids_question_information5]
GO
ALTER TABLE [dbo].[question_information6]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information6] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information6] CHECK CONSTRAINT [FK_question_ids_question_information6]
GO
ALTER TABLE [dbo].[question_information7]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information7] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information7] CHECK CONSTRAINT [FK_question_ids_question_information7]
GO
ALTER TABLE [dbo].[question_information8]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information8] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information8] CHECK CONSTRAINT [FK_question_ids_question_information8]
GO
ALTER TABLE [dbo].[question_information9]  WITH CHECK ADD  CONSTRAINT [FK_question_ids_question_information9] FOREIGN KEY([question_id])
REFERENCES [dbo].[question_ids] ([question_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[question_information9] CHECK CONSTRAINT [FK_question_ids_question_information9]
GO
ALTER TABLE [dbo].[subject_results]  WITH CHECK ADD  CONSTRAINT [FK_users_subject_results] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([user_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[subject_results] CHECK CONSTRAINT [FK_users_subject_results]
GO
ALTER TABLE [dbo].[tables]  WITH CHECK ADD  CONSTRAINT [FK_classes_tables] FOREIGN KEY([class_id])
REFERENCES [dbo].[classes] ([class_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[tables] CHECK CONSTRAINT [FK_classes_tables]
GO
ALTER TABLE [dbo].[users_results]  WITH CHECK ADD  CONSTRAINT [FK_users_user_results] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([user_id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[users_results] CHECK CONSTRAINT [FK_users_user_results]
GO
USE [master]
GO
ALTER DATABASE [questionnaire] SET  READ_WRITE 
GO
