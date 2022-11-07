<?php
class Stable
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): Stable
    {
        $this->name = $name;

        return $this;
    }
}
class Tyre
{
    public const TYPE_SOFT = 0;
    public const TYPE_MEDIUM = 1;
    public const TYPE_HARD = 2;
    public const TYPE_INTER = 3;
    public const TYPE_WET = 4;

    private int $type;
    private int $lap;

    public function __construct(int $type = self::TYPE_MEDIUM)
    {
        $this->type = $type;
        $this->lap = 0;
    }

    public function getGrip(): float
    {
        $maxLap = 40;
        $grip = 0;
        switch ($this->type) {
            case self::TYPE_SOFT:
                $grip = 0.8;
                $maxLap = 20;
                break;
            case self::TYPE_MEDIUM:
                $grip = 0.9;
                $maxLap = 30;
                break;
            case self::TYPE_HARD:
                $grip = 1.0;
                $maxLap = 40;
                break;
            case self::TYPE_INTER:
                $grip = 0.7;
                $maxLap = 20;
                break;
            case self::TYPE_WET:
                $grip = 0.6;
                $maxLap = 20;
                break;
        }
        if ($this->getLap() > $maxLap) {
            $grip /= 2;
        }
        return $grip;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getLap(): int
    {
        return $this->lap;
    }

    /**
     * @param int $lap
     */
    public function setLap(int $lap): void
    {
        $this->lap = $lap;
    }

}

class Engine
{
    protected int $cylinders;
    protected int $horsePower;
    protected float $fiability; // (nul)0 >>> 1(fiable)
    protected string $brand;
    protected string $year;

    public function __construct(int $cylinders, int $horsePower, float $fiability, string $brand, string $year)
    {
        $this->cylinders = $cylinders;
        $this->horsePower = $horsePower;
        $this->fiability = $fiability;
        $this->brand = $brand;
        $this->year = $year;
    }

    /**
     * @param int $cylinders
     * @return Engine
     */
    public function setCylinders(int $cylinders): Engine
    {
        $this->cylinders = $cylinders;

        return $this;
    }

    /**
     * @return int
     */
    public function getCylinders(): int
    {
        return $this->cylinders;
    }

    /**
     * @param int $horsePower
     * @return Engine
     */
    public function setHorsePower(int $horsePower): Engine
    {
        $this->horsePower = $horsePower;

        return $this;
    }

    /**
     * @return int
     */
    public function getHorsePower(): int
    {
        return $this->horsePower;
    }

    /**
     * @param float $fiability
     * @return Engine
     */
    public function setFiability(float $fiability): Engine
    {
        $this->fiability = $fiability;

        return $this;
    }

    /**
     * @return float
     */
    public function getFiability(): float
    {
        return $this->fiability;
    }

    /**
     * @param string $brand
     * @return Engine
     */
    public function setBrand(string $brand): Engine
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $year
     * @return Engine
     */
    public function setYear(string $year): Engine
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }


}

class Car
{
    protected string $brand;
    protected Driver $driver;
    protected Engine $engine;// <<<< reference
    protected Stable $stable;
    protected Tyre $tyres;
    protected int $maxSpeed;
    protected float $aeroCoef; // (nul)0 >>> 1(efficace)

    public function __construct(
        string $brand,
        Engine $engine,
        float  $aero = 0.5,
        int    $maxSpeed = 340
    )
    {
        $this->brand = $brand;
        $this->engine = $engine;
        $this->tyres = new Tyre(Tyre::TYPE_SOFT);
        $this->maxSpeed = $maxSpeed;
        $this->aeroCoef = $aero;
    }

    public function addLap(): void
    {
        $this->tyres->setLap($this->tyres->getLap() + 1);
    }

    /**
     * @param string $brand
     * @return Car
     */
    public function setBrand(string $brand): Car
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }


    /**
     * @param int $maxSpeed
     * @return Car
     */
    public function setMaxSpeed(int $maxSpeed): Car
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    /**
     * @param float $aeroCoef
     * @return Car
     */
    public function setAeroCoef(float $aeroCoef): Car
    {
        $this->aeroCoef = $aeroCoef;

        return $this;
    }

    /**
     * @return float
     */
    public function getAeroCoef(): float
    {
        return $this->aeroCoef;
    }

    /**
     * @param Engine $engine
     * @return Car
     */
    public function setEngine(Engine $engine): Car
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param Driver $driver
     * @return Car
     */
    public function setDriver(Driver $driver): Car
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * @return Driver
     */
    public function getDriver(): Driver
    {
        return $this->driver;
    }

    /**
     * @param Stable $stable
     * @return Car
     */
    public function setStable(Stable $stable): Car
    {
        $this->stable = $stable;

        return $this;
    }

    /**
     * @return Stable
     */
    public function getStable(): Stable
    {
        return $this->stable;
    }

    /**
     * @param Tyre $tyres
     * @return Car
     */
    public function setTyres(Tyre $tyres): Car
    {
        $this->tyres = $tyres;

        return $this;
    }

    /**
     * @return Tyre
     */
    public function getTyres(): Tyre
    {
        return $this->tyres;
    }
}

class Driver
{
    protected string $name;
    protected Stable $stable;

    public function __construct(string $name, Stable $stable)
    {
        $this->name = $name;
        $this->stable = $stable;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Stable $stable
     * @return Driver
     */
    public function setStable(Stable $stable)
    {
        $this->stable = $stable;

        return $this;
    }

    /**
     * @return Stable
     */
    public function getStable(): Stable
    {
        return $this->stable;
    }
}

class FerrariF175 extends Car
{
    public function __construct(Engine $engine, Stable $stable, Driver $driver)
    {
        parent::__construct('Ferrari', $engine, 0.7, 330);
        $this->setDriver($driver);
        $this->setStable($stable);
    }
}

$stable1 = new Stable('Ferrari');
$stable2= new Stable('Mercedes');
$leclerc = new Driver('Charles Leclerc', $stable1);
$sainz = new Driver('Carlos Sainz', $stable1);

$ferrariPowerUnit = new Engine(6, 500, 0.6, 'Ferrari', '2022');


$ferarri = new FerrariF175($ferrariPowerUnit, $stable1, $leclerc);
$ferarri->setDriver($leclerc)->setTyres(new Tyre(Tyre::TYPE_SOFT));
$ferarri->addLap();

$ferarri2 = new FerrariF175($ferrariPowerUnit,$stable2, $sainz);
$ferarri2->setDriver($sainz)->setTyres(new Tyre(Tyre::TYPE_SOFT));

var_dump($ferarri, '___________', $ferarri2);