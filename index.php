<?php
// [abstract] Personnage (variables):
// - nom (string)
// - dateDeCreation (\DateTime)
// - phyPower (int) (0-100)
// - magPower (int) (0-100)
// - armor (int) (0-100)
// - escape (int) (0-100) // chance to escape // rogue.escape = 95 // warrior.escape = 50 => mt_rand(0,  (escape - 100))
// - life (int) (0-100)
// - mana (int) (0-100)
// - classe (string) : guerrier, mage, voleur, archer, ....
abstract class Character {
    /**
     * @var string : Character name
     */
    protected string $name;
    /**
     * @var DateTime : Creation date
     */
    protected DateTime $creationDate;
    /**
     * @var int : Physical power stat
     */
    protected int $phyPower;
    /**
     * @var int : Magical power stat
     */
    protected int $magPower;
    /**
     * @var int : Armor stat
     */
    protected int $armor;
    /**
     * @var int : Dodge stat
     */
    protected int $escape;
    /**
     * @var int : HP stat
     */
    protected int $life;
    /**
     * @var int : MP stat
     */
    protected int $mana;
    /**
     * @var Weapon|null : equipped weapon
     */
    protected ?Weapon $weapon;
    /**
     * @var Shield|null : equipped shield
     */
    protected ?Shield $shield;
    /**
     * @var Bag : backpack
     */
    protected Bag $inventory;
    /**
     * @var string : character class
     */
    protected string $classe;

    public function __construct(
        string $name,
        string $classe
    ){
        $this->name = $name;
        $this->creationDate = new \DateTime();
        $this->phyPower = 10;
        $this->magPower = 10;
        $this->armor = 10;
        $this->escape = 10;
        $this->life = 10;
        $this->mana = 10;
        $this->weapon = null;
        $this->shield = null;
        $this->inventory = new Bag();
        $this->classe = $classe;
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
    public function setName(string $name): Character
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param DateTime $creationDate
     */
    public function setCreationDate(DateTime $creationDate): Character
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhyPower(): int
    {
        return $this->phyPower;
    }

    /**
     * @param int $phyPower
     */
    public function setPhyPower(int $phyPower): Character
    {
        $this->phyPower = $phyPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagPower(): int
    {
        return $this->magPower;
    }

    /**
     * @param int $magPower
     */
    public function setMagPower(int $magPower): Character
    {
        $this->magPower = $magPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @param int $armor
     */
    public function setArmor(int $armor): Character
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * @return int
     */
    public function getEscape(): int
    {
        return $this->escape;
    }

    /**
     * @param int $escape
     */
    public function setEscape(int $escape): Character
    {
        $this->escape = $escape;

        return $this;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * @param int $life
     */
    public function setLife(int $life): Character
    {
        $this->life = $life;

        return $this;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     */
    public function setMana(int $mana): Character
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * @return Weapon|null
     */
    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    /**
     * @param Weapon|null $weapon
     */
    public function setWeapon(?Weapon $weapon): Character
    {
        $this->weapon = $weapon;
    }

    /**
     * @return Shield|null
     */
    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    /**
     * @param Shield|null $shield
     */
    public function setShield(?Shield $shield): Character
    {
        $this->shield = $shield;
    }

    /**
     * @return Bag
     */
    public function getInventory(): Bag
    {
        return $this->inventory;
    }

    /**
     * @param Bag $inventory
     */
    public function setInventory(Bag $inventory): Character
    {
        $this->inventory = $inventory;
    }

    /**
     * @return string
     */
    public function getClasse(): string
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     */
    public function setClasse(string $classe): Character
    {
        $this->classe = $classe;

        return $this;
    }

    public function useItem(Item $item) {

    }
    // TODO - [public] useItem(Item $item) => if item.equipable === false

    public function EquipItem (Item $item) {

    }
    // TODO - [public] equipItem (Item $item) => if item.equipable === true

    // TODO item is Shield : ($item === Shield && Personnage.weapon.isTwoHanded === false)
    // TODO item is weapon : ($item === Weapon) => si item.isTwoHanded === true => unequipItem($shield)
    // TODO - [public] unequipItem (Item $item) : deséquiper un item
    // TODO - [public] attackTarget(Personnage $target) : attaquer un personnage => code pour calculer les dégats et l'utilisation de mana
    // TODO $damage = [calcul des dmg];
    // TODO $target->receiveDamage($damage);
    // TODO [public] receiveDamage(int $damage) : recevoir des dégats => code pour calculer les dégats
    // TODO - [private] isDodged() : calculer si le personnage a esquivé l'attaque mt_rand(0,  (escape - 100)) === (escape - 100)
    // TODO - [public] isAlive() : vérifier si le personnage est en vie
    // TODO Personnage->useItem(Item $item)
    // TODO Personnage->equipItem(Item $item) -> if item.equipable === true
    // TODO Personnage->attackTarget(Personnage $target)
}

class Bag {
    /**
     * @var int : Item storage size
     */
    protected int $size;
    /**
     * @var array : Item list
     */
    protected array $item;

    public function __construct(
        int $size
    )
    {
        $this->size = $size;
    }

    public function addItem(Item $item) : Bag
    {

    }
    // TODO addItem(Item $item): Bag

    public function removeItem(Item $item) : Bag
    {

    }
    // TODO removeItem(Item $item): Bag

    public function hasItem(Item $item) : bool
    {

    }
    // TODO hasItem(Item $item): bool
}

class Warrior extends Character  {

    public function __construct(string $name)
    {
        parent::__construct($name, 'Warrior');
        $this->setPhyPower(random_int(20, 40));
        $this->setMagPower(random_int(0, 10));
        $this->setEscape(random_int(0, 100));
    }

}
class Mage extends Character {
    public function __construct(string $name)
    {
        parent::__construct($name, 'Mage');
        $this->setPhyPower(random_int(0, 10));
        $this->setMagPower(random_int(20, 40));
        $this->setEscape(random_int(0, 100));
    }
}
class Rogue extends Character {
    public function __construct(string $name)
    {
        parent::__construct($name, 'Rogue');
        $this->setPhyPower(random_int(10, 20));
        $this->setMagPower(random_int(5, 15));
        $this->setEscape(random_int(0, 50));
    }
}
abstract class Foe extends Character {
// TODO nom random, stats random
// TODO Foe : bat|zombie|orc|gobelin|squelette
// TODO each Foe override attackTarget(Personnage $target) => code pour calculer les dégats et l'utilisation de mana

}
abstract class Item {
    /**
     * @var string : Item name
     */
    protected string $name;
    /**
     * @var string : Item description
     */
    protected string $description;
    /**
     * @var bool : If item is equipable
     */
    protected bool $equipable;
    /**
     * @var string : Item type
     */
    protected string $type;
    /**
     * @var string : Item id
     */
    protected string $id;

    public function __construct(
        string $name,
        string $description,
        bool $equipable,
        string $type
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->equipable = $equipable;
        $this->type = $type;
        $this->id = microtime() . random_int(1,999);
    }
// TODO - type (string) : weapon|shield|armor|potion|food|key|quest|misc

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
    public function setName(string $name): Item
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): Item
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isEquipable(): bool
    {
        return $this->equipable;
    }

    /**
     * @param bool $equipable
     */
    public function setEquipable(bool $equipable): Item
    {
        $this->equipable = $equipable;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): Item
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): Item
    {
        $this->id = $id;
    }
}
class Weapon extends Item {
// TODO - damage (int)
// TODO - isTwoHanded (bool)
// TODO - weaponClass (string) : sword|axe|dagger|bow|staff|wand|spear|hammer|fist
}
class Shield extends Item {
// TODO - armor (int)
protected int $armor;
}
class Potion extends Item {
// TODO - const TYPE_HEAL = 'heal', TYPE_MANA = 'mana'
// TODO - amount (float)
// TODO - type (string)(self::TYPE_HEAL|self::TYPE_MANA)
// TODO - used (bool) (false)
}

$brutus = new Warrior("Brutus");
$gandolfr = new Mage("Brutus");
$saskue = new Rogue("Saskue");


var_dump($brutus, '______________', $gandolfr, '______________', $saskue);


// Item > Weapon > Sword > LongSword
// Item > Weapon > Sword > GreatSword
// Item > Weapon > Staff > FireStaff
// Item > Shield > SmallShield
// Item > utility > Potion > HealthPotion
// Item > utility > Potion > ManaPotion

// Personnage->useItem(Item $item)
// Personnage->equipItem(Item $item) -> if item.equipable === true
// Personnage->attackTarget(Personnage $target)