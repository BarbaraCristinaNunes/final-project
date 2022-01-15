# final-project

During BeCode training I had to create a big project in which I would practice everything that I have leanded since I started the course. In this project I diceided to apply my new skills and knowledge to resolve I problem with which I had to deal such as a biologist in searches laboratories.

---
## Contextualizing the problem

Such as a biologist I worked in laboratories related to ecology and biodiversity studies. During the searches I had to collect samples such as plants, insects, soil and fungi, and to keep these samples in our laboratory, but I had more experience in searches related to ecology vegetal and plants in general.

Usually there are a lot of students working in these laboratories with different projects that can be related to each other or not. They also keep the data collected in tables without any pre-established pattern to write, keep and share them. 

Although there is data from each project with students and, in vegetable samples cases, there are exsiccates in a physical collection, it is not always so simple to access this data because a student who was keeping the datas left the laboratory or lost these information, datas were not registered correctly, the collection is not well organized or there is a large volume of data that become it is impossible check one by one to see if it is what you need now.  Another big problem in this scenery is that they don't have their own virtual library where they could keep these information saved and they don't feel safe to keep these datas in a publics libraries because they don't want people outside their laboratories to have access to their them.

<i><b> You can read about this kind of [collection](https://en.wikipedia.org/wiki/Herbarium); 

You can read about exsiccates [definition](https://www.etymonline.com/word/exsiccate) and [proccess](https://en.wikipedia.org/wiki/Desiccation);</b></i>

![Exsiccate example](/img/herbarium.jpg)

[SiBBr](https://ala-hub.sibbr.gov.br/ala-hub/#tab_simpleSearch) is an example of public library from Brazil

![SiBBr page](/img/SiBBr.jpg)

[GBIF](https://www.gbif.org/) is an international library example.

![GBIF page](/img/GBIF.jpg)

----

## Project proposal

My proposal to resolve laboratories' managed data problem and to offer better organization, security and quality of biological data is to build an application where the professor in charge of the laboratory can create an account as administrator and store, read, delete and update  these data with a pre-established pattern. He can do it manually adding line by line or sending a table that contains the data.
 
The teacher also can create a public account. This public account is associated with the administer account and only his students or contributors can read the data. The user can not create, delete or update any data, it is an option only to read data. So this public account allows the students and the contributors access the data and get what they need to their searches without compromising data integrity.

## Project challenges

### 1. Data
* Deal with biological data is not so simple because they are generated from different projects, with varied goals. So the searchers don't apply the same methods to answer their hypothesis and obtain unique data types for a specific application. Therefore I decided not to approach ecological data and to focus in a biodiversity library.

### 2. Time and project scale
* I have a short time to do my project (2 months) and to build a library to keep biodiversity data and to reduce the chances that the user inserts data with spelling mistakes in information about biological classification demand a data collection effort that is not feasible in 2 months. Therefore I decided to scale down the project and create a MVC to work with botanic data about [Angiosperms](https://www.britannica.com/plant/angiosperm/General-features).

The following image exemplifies [biological classification]() which I mentioned above.

![biological classification](/img/biological_classification.png)

----
## Database Structure

There will be three tables in database.
* PROJECT;
* SUBPROJECT;
* SPECIES;
* LOCATION;
* COLLECT_EVENT;

### <b>1. PROJECT table</b>

There are a lot of projects in laboratories and it is very interesting to relate data to the projects for which it is collected. So we can have more control over which information we should send to each funding institution or to which institution we should thank when we publish these datas.

    Project will be worked on such as an object. Each collect event must to have a project and different collect events can have the same project.

    Information from all columns are mandatories.


| id        | name          | coordinator  | funding institution |
| --------- |:-------------:| ------------:| -------------------:|
|      1    | PELD          | GW           | CNPq                |

### <b>2. SUBPROJECT table</b>

The projects are usually divided in subprojects. Each subproject deals with specific goals and different information, so it is interesting to relate data to the subprojects for which it is collected.

    Subproject will be worked on such as an object. Each collect event can have or not a subproject (it is not mandatory) and different collect events can have the same project.

    Information from all columns are mandatories.


| id        | project_id|name                      |
| --------- | --------- |:------------------------:|
|      1    |       1   |Invasive species          |

### <b>3. SPECIES table</b>

    Plant specie will be worked on such as an object. Each collect event must to be a plant specie and different collect events can have the same plant specie.

    Information from all columns are mandatories.



| id | kingdom | phylum        | class        |order     |family    |genus     |species                  |
| -- |--------:|-------------: |-------------:|---------:|---------:|---------:|------------------------:|
| 1  | Plantae | Tracheophytes |Magnoliopsida |Asterales |Asteraceae|Baccharis |Baccharis dracunculifolia|

### <b>4. LOCATION table</b>

    Location will be worked on such as an object. Each collect event must to be a location and different collect events can have the same location.

    Information from all columns are mandatories.

| id | country | locality      | municipality |latitude_s|longitude_w|
| -- |--------:|-------------: |-------------:|---------:|----------:|
| 1  | brazil  | minas gerais  |serra do cipo |-19.28    |-43.60     |

### <b>5. COLLECT_EVENT table</b>

In collect_event table we do the link with all tables we have through id_specie (SPECIES table), id_local (LOCATION table), id_project (PROJECT table) and id_subproject (SUBPROJECT table).

| id | id_specie |id_local |id_project|id_subproject|id_collection|id_field|collector_name|taxonomist_name|data_colect|extra_informmation|image|
| -- |--:|---: |---:|--:|--:|--:|--:|--:|--:|--:|--:|
| 1  | 1 | 1 |1 |null |null|567 |ana|bob|2020-01-01|t4-p6|.img/.pdf/.jpg|

#### <b>Columns</b>

* id_specie => <b>It can not be empty!</b>

* id_local => <b>It can not be empty!</b>

* id_project => <b>It can not be empty!</b>

* id_subproject => <b>It can not be empty!</b>

* id_collection => We are considering that the laboratory already has a collection. So the teacher should be able to link phisical collection with virtual collection. <b>This field can be empty</b> because a laboratory also can not have a phisical collection.

* id_field => During field work seraches give id to plants where they are work, so they can identify them and work with these plants over time. So we created this column to receive this data. <b>This field can be empty</b> because sometime it doesn't applicable to plants in phisical collection because they can't have this information.

* collector_name => Who collected this sampple. <b>It can not be empty</b>

* taxonomist_name => Who identified this sample. <b>It can not be empty</b>

* data_colect => When this sample was collected. <b>It can not be empty</b>

* extra_informmation => The user can write what he think it is important about this collect. <b>It can be empty</b>

* image => exsiccates images. <b>It can be empty</b>