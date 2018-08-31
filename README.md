# import-frame

Basic framework for data import.


## Why?
Allows you to structure the process of requesting data from external sources, adapt them to the format to work in your application, as well as to execute a strategy for processing the received data.

## Usage

You must implement the IAPI, IConverter and IStrategy, and then create an instance of the Importer object and call the run method passing the context for IAPI.

For your convenience, an abstract basic implementation of the IAPI, IConverter, IStrategy is made

```
php
   $importer = new Importer(new ImplementAPI(), new ImplementConverter(), new ImplementStrategy());
   $strategyResponce = $importer->run(new ContextAPI('token'));
   print_r($strategyResponce);
```

1.[Documents](./documentor/)

2.[UML](./PlantUML)

## Images

![ImporterClassDiagram][image1]
---
![ImporterDataModel][image2]
---
![Importer_logic][image3]
---
![Persistece_Run_Sequences][image4]
---

[image1]: ./PlantUML/ImporterClassDiagram.png/ "Importer class Diagram"
[image2]: ./PlantUML/ImporterDataModel.png/ "Importer data model"
[image3]: ./PlantUML/Importer_logic.png/ "Importer logic"
[image4]: ./PlantUML/Persistece_Run_Sequences.png/ "Persistece run sequences"
